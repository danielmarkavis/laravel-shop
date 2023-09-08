<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->decimal('subtotal', 6,2);
            $table->decimal('vat', 6,2);
            $table->decimal('total', 6,2);
            $table->string('status');
            $table->foreignId('shipping_address_id');
            $table->foreign('shipping_address_id')->references('id')->on('customer_address')->onDelete('cascade');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['shipping_address_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('orders');
    }
};
