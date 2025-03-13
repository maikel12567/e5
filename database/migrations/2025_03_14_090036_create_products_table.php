<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->foreignId('product_type_id')->constrained('product_types'); // Corrected
            $table->string('material');
            $table->string('production_time');
            $table->string('complexity');
            $table->string('sustainability');
            $table->string('unique_properties');
            $table->double('price');
            $table->foreignId('review_id')->constrained('reviews'); // Corrected
            $table->string('image');
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
