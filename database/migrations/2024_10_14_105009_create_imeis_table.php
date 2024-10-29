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
        Schema::create('imeis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('items_id');
            $table->foreign('items_id')
                ->references('id')
                ->on('items');

            $table->string('imei');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imeis');
    }
};
