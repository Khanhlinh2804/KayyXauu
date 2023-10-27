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
            $table->string('name');
            $table->string('images');
            $table->double('price');
            $table->double('sale_price')->default('0');
            $table->enum('status',['stocking','out of stock'])->default('stocking');
            $table->integer('quatity');
            $table->bigInteger('color')->default(1);
            $table->longText('description');
            $table->text('summary')->default('Kayxau');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->softDeletes();
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
