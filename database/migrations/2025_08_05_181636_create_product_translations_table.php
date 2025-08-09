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
        Schema::create('product_translations', function (Blueprint $table) {
            $table->id('product_translation_id');

            $table->foreignId('product_id')->constrained('products', 'product_id')->onDelete('cascade');
            $table->string('language_code', 10);
            $table->foreign('language_code')->references('language_code')->on('languages')->onDelete('cascade');

            $table->string('name');
            $table->text('description')->nullable();

            $table->unique(['product_id', 'language_code'], 'unique_product_language');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_translations');
    }
};
