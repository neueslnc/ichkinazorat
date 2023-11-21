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
        Schema::create('criteria_on_prices', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('dop_criteria_id');
            $table->foreign('dop_criteria_id')->references('id')->on('dop_criterias');
            $table->integer('criteria_price_id');
            $table->foreign('criteria_price_id')->references('id')->on('price_criterias');
            $table->float('price', 10, 2)->default(0);
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
        Schema::dropIfExists('criteria_price_models');
    }
};
