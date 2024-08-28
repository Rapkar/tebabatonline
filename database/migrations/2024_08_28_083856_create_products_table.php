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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('content');
            $table->float('price');
            $table->float('discount');
            // $table->bigInteger('count');
            $table->integer('quantity');
            $table->string('expert')->nullable();
            $table->string('image')->nullable();
            $table->string('gallery')->nullable();
            $table->string('status');
            $table->string('slug')->unique();
            $table->bigInteger('count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};