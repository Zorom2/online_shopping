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

            $table->integer('category_id');
            $table->integer('brand_id');

            $table->string('name');
            $table->string('photo1');            
            $table->string('photo2');            
            $table->string('photo3');            
            $table->string('photo4');

            $table->integer('price');            
            $table->integer('qty'); 
                       
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
        Schema::dropIfExists('products');
    }
};
