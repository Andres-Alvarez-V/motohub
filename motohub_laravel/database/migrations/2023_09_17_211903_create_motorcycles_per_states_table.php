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
        Schema::create('motorcycles_per_states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('motorcycle_id')->references('id')->on('motorcycles');
            $table->foreignId('state_id')->references('id')->on('states');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorcycles_per_states');
    }
};
