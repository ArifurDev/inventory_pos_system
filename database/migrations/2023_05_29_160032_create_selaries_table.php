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
        Schema::create('selaries', function (Blueprint $table) {
            $table->id();
            $table->integer('empolyee_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('selary');
            $table->integer('advanch')->nullable();
            $table->integer('due')->nullable();
            $table->string('salary_date')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selaries');
    }
};
