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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('summary');
            $table->longText('content');
            $table->string('tag');
            $table->string('image')->nullable()->default('text'); 
            $table->enum('status', ['true', 'false'])->default('true'); 
            $table->bigInteger('size')->default(1);
            $table->foreignId('skill_id')->references('id')->on('skills');
            $table->string('author', 200);
            $table->softDeletes();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
