<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bred_for')->nullable();
            $table->string('breed_group')->nullable();
            $table->string('height')->nullable();
            $table->string('image_url')->nullable();
            $table->string('life_span')->nullable();
            $table->string('origin')->nullable();
            $table->string('temperament')->nullable();
            $table->string('weight')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breeds');
    }
};
