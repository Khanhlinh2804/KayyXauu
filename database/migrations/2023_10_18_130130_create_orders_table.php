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
            $table->string('name');
            $table->string('lastname');
            $table->string('address');
            $table->string('city');
            $table->string('districts');
            $table->string('phone', 11);
            $table->enum('payment', ['cod', 'vnpay'])->default('cod');
            $table->string('email', 150)->nullable();
            $table->string('note', 255)->default('NO');
            $table->tinyInteger('status')->default(1);
            $table->foreignId('user_id')->references('id')->on('users')->nullable();
            $table->softDeletes();
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
