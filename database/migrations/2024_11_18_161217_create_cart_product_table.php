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
        Schema::create('cart_product', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('user_id')->unsigned();
            // $table->bigInteger('product_id')->unsigned();
            $table->integer('quantity')->unsigned()->default(1);
            $table->foreignId('cart_id')->references('id')->on('carts')->onDelete('cascade'); // Reference to the order
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade'); // Reference to the product
            // $table->unique(['cart_id', 'product_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_product');
    }
};
