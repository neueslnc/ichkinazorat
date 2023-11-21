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
        Schema::create('dop_criterias', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('main_criteria_id');
            $table->foreign('main_criteria_id')->references('id')->on('main_criterias');
            $table->string('name');
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
        Schema::dropIfExists('dop_criterias');
    }
};
