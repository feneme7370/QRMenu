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
            $table->double('price');
            $table->longText('description')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('subcategory_id')->constrained()->onUpdate('cascade')->restrictOnDelete();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->restrictOnDelete();
            $table->foreignId('company_id')->constrained()->onUpdate('cascade')->restrictOnDelete();
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
