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
        Schema::create('rumahtanggas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('harga');
            $table->integer('stok');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('ulasan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumahtanggas');
    }
};
