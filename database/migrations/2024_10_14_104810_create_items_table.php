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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('description');
            $table->string('tax');
            $table->string('mrp_price');
            $table->string('purchuce_price');


            $table->unsignedBigInteger('agents_id')->nullable();
            $table->foreign('agents_id')
                ->references('id')
                ->on('agents');

            $table->unsignedBigInteger('dealers_id')->nullable();
            $table->foreign('dealers_id')
                ->references('id')
                ->on('dealers');

            $table->unsignedBigInteger('distributors_id')->nullable();
            $table->foreign('distributors_id')
                ->references('id')
                ->on('distributors');

            $table->unsignedBigInteger('brands_id');
            $table->foreign('brands_id')
                ->references('id')
                ->on('brands');



            $table->unsignedBigInteger('colours_id');
            $table->foreign('colours_id')
                ->references('id')
                ->on('colours');


            $table->unsignedBigInteger('product_models_id');
            $table->foreign('product_models_id')
                ->references('id')
                ->on('product_models');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
