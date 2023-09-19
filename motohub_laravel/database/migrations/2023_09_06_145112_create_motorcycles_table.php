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
        Schema::create('motorcycles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->string('category');
            $table->string('image');
            $table->text('description');
            $table->unsignedDouble('price', null, 2);
            $table->unsignedInteger('stock');
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('state_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('state_id')->references('id')->on('states');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorcycles');
    }
};
