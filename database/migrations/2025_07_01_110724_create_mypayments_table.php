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
        Schema::create('mypayments', function (Blueprint $table) {
            $table->id();

            $table->integer('order_id');
            $table->integer('amount');
            $table->string('phone');
            $table->string('transaction');
            $table->string('payment_method');

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
        Schema::dropIfExists('mypayments');
    }
};
