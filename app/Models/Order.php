<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'uuid',
        'shipping_address_id',
        'status',
        'total',
        'vat',
        'subtotal',
    ];

    public function products(): HasMany
    {
        return $this
            ->HasMany(OrderProduct::class);
    }

    public function address(): HasOne
    {
        return $this
            ->HasOne(Address::class,'id', 'shipping_address_id');
    }

    public function scopeWhereAuthed(Builder $query): void
    {
        $query
            ->where('user_id', auth()->user()->id ?? null);
    }
}
