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
        Schema::create('c_p_on_users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('criteri_on_price_id');
            $table->foreign('criteri_on_price_id')->references('id')->on('criteria_on_prices');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('c_p_on_user_models');
    }
};
