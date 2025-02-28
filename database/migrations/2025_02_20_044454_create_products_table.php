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
            $table->string('product_name');
            $table->string('slug')->unique()->index();
            $table->json('images')->nullable(); // Consider a separate product_images table
            $table->longText('description')->nullable();
            $table->decimal('price', 10, 2)->nullable(); 
            $table->boolean('in_stock')->default(true)->index();
            $table->integer('stock_quantity')->default(0);
            $table->boolean('is_active')->default(true)->index();
            $table->boolean('has_variant')->default(false);
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
