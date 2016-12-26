<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('model_id')->unsigned();
            $table->foreign('model_id')->references('id')->on('models');
            $table->integer('fuel')->unsigned();
            $table->foreign('fuel')->references('id')->on('fuels');
            $table->string('registration');
            $table->integer('color')->unsigned()->nullable();
            $table->foreign('color')->references('id')->on('colors');
            $table->integer('year');
            $table->integer('capacity');
            $table->boolean('isAutomatic')->default(false);
            $table->text('equipment')->nullable();
            $table->integer('class')->unsigned()->nullable();
            $table->foreign('class')->references('id')->on('classes');
            $table->integer('type')->unsigned();
            $table->foreign('type')->references('id')->on('types');
            $table->integer('minAge');
            $table->integer('pricePerDay');
            $table->string('img');
            $table->integer('branchID')->unsigned();
            $table->foreign('branchID')->references('id')->on('branches');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cars');
    }
}
