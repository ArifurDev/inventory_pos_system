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
            $table->string('category_name');
            $table->integer('category_id');
            $table->string('supplier_name')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->string('product_name');
            $table->string('product_code')->nullable();
            $table->string('product_storehouse')->nullable();
            $table->string('product_route')->nullable();
            $table->string('product_image');
            $table->string('buy_date');
            $table->string('expaire_date')->nullable();
            $table->string('buying_price');
            $table->string('seling_price');
            $table->timestamps();
            $table->softDeletes();
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
