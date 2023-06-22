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
            $table->id();
            $table->integer('customar_id');
            $table->string('order_date');
            $table->string('order_status');
            $table->string('total_products');
            $table->string('sub_total');
            $table->string('vat');
            $table->string('total');
            $table->string('payment_status');
            $table->integer('pay');
            $table->integer('due')->nullable()->default(0);
            $table->timestamps();
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
