<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $products = Product::with(['media'])->get();

        return view('pages.products.index', compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.products.show', compact('product'));
    }

}
