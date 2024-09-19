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
            $table->id(); // Auto-incrementing ID for the order
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Reference to the user who placed the order
            $table->decimal('total_amount', 10, 2); // Total amount for the order
            $table->string('status')->default('pending'); // Order status (e.g., pending, completed, canceled)
            $table->string('payment_method'); // Payment method used (e.g., credit card, PayPal)
            $table->string('shipping_address'); // Shipping address for the order
            $table->timestamps(); // Created at and updated at timestamps
            $table->index(['user_id']);
            $table->index(['status']);
            $table->index(['created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
