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
        Schema::create('describtion_recommendation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('describtion_id')->references('id')->on('describtions')->onDelete('cascade'); // Reference to the product

            $table->foreignId('recommendation_id')->references('id')->on('recommendations')->onDelete('cascade'); // Reference to the product

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('describtion_recommendation');
    }
};
