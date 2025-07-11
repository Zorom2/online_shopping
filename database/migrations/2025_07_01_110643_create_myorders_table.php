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
        Schema::create('myorders', function (Blueprint $table) {
            $table->id();

            $table->integer('order_id');
            $table->integer('user_id');
            $table->integer('product_id');

            $table->string('name');
            $table->integer('price');
            $table->integer('qty');
            $table->integer('amount');

            $table->string('status')->nullable();
            $table->string('remark')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('myorders');
    }
};
