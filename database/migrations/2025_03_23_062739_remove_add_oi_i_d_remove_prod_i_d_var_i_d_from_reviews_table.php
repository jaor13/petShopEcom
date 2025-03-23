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
        Schema::table('reviews', function (Blueprint $table) {
            // Drop foreign keys first
            $table->dropForeign(['product_id']);
            $table->dropForeign(['variant_id']);

            // Remove columns
            $table->dropColumn(['product_id', 'variant_id']);

            // Add order_item_id column with foreign key
            $table->foreignId('order_item_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Remove order_item_id
            $table->dropForeign(['order_item_id']);
            $table->dropColumn('order_item_id');

            // Add product_id and variant_id back
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('variant_id')->nullable()->constrained('product_variants')->onDelete('cascade');
        });
    }
};
