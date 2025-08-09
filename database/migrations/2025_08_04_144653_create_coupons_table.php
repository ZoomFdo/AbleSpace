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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id('coupon_id');
            $table->string('coupon_code')->unique();
            $table->integer('discount_percent')->unsigned();
            $table->decimal('min_order_amount', 10, 2)->default(0.00);
            $table->dateTime('valid_from_date')->nullable();
            $table->dateTime('valid_until_date')->nullable();
            $table->integer('usage_limit')->unsigned()->default(0);
            $table->integer('used_count')->unsigned()->default(0);
            $table->boolean('is_active')->default(true);
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
