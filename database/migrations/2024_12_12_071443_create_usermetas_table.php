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
        Schema::create('usermetas', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable(); 
            $table->string('lastname')->default('');
            $table->string('job')->default('');
            $table->string('age')->default('');
            $table->string('height')->default('');
            $table->string('gender')->default('');
            $table->string('relationship')->default('');
            $table->string('state')->default('');
            $table->string('city')->default('');
            $table->string('address')->default('');
            $table->string('postalcode')->default('');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usermetas');
    }
};
