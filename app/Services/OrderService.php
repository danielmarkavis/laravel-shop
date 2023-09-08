<?php

namespace App\Services;

use App\Contracts\OrderInterface;
use App\Contracts\PaymentServiceInterface;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Str;

class OrderService implements OrderInterface
{
    public function get(int $order_id)
    {
        return Order::find($order_id);
    }

    public function store(CartService $cart, Address $address): Order
    {
        $orderSession = session()->get('order', []);

        if(isset($orderSession['uuid'])) {
            $order = Order::where('uuid', $orderSession['uuid'])->first();
        } else {
            $orderSession['uuid'] = Str::uuid()->toString();

            $totalPrice = $cart->totalPrice();
            $subtotal = ($totalPrice/120)*100;
            $vat = $totalPrice - (($totalPrice/120)*100);

            $order = new Order();
            $order->uuid = $orderSession['uuid'];
            $order->subtotal = $subtotal;
            $order->vat = $vat;
            $order->total = $totalPrice;
            $order->status = PaymentServiceInterface::PAYMENT_PENDING;
            $order->shipping_address_id = $address->id;
            $order->user_id = auth()->user()->id;
            $order->save();

            foreach ($cart->get() as $variant) {
                $orderProduct = new OrderProduct();
                $orderProduct->order_id = $order->id;
                $orderProduct->variant_id = $variant['id'];
                $orderProduct->quantity = $variant['quantity'];
                $orderProduct->price = $variant['price'];
                $orderProduct->save();
            }
        }

        session()->put('order', $orderSession);

        return $order;
    }

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function destroy(string $sku): void
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$sku])) {
            unset($cart[$sku]);
        }

        session()->put('cart', $cart);
    }

    public function getSessionOrder()
    {
        $orderUUID = $this->getOrderUUID();
        if ($orderUUID === null) {
            return null;
        }

        return Order::where('uuid', $orderUUID)->first();
    }


    public function getOrderUUID()
    {
        $orderSession = session()->get('order', []);

        return $orderSession['uuid'] ?? null;
    }

    public function purgeSession(): void
    {
        session()->put('order', []);
    }

}
