<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userID')->unsigned();
            $table->foreign('userID')->references('id')->on('users');
            $table->integer('carID')->unsigned();
            $table->foreign('carID')->references('id')->on('cars')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('pickupLocation')->unsigned();
            $table->foreign('pickupLocation')->references('id')->on('branches');
            $table->integer('returnLocation')->unsigned();
            $table->foreign('returnLocation')->references('id')->on('branches');
            $table->timestamp('pickupDate');
            $table->timestamp('returnDate');
            $table->text('extras')->nullable();
            $table->integer('price');
            $table->boolean('isPending')->nullable();
            $table->boolean('isPaid')->nullable();
            $table->boolean('isCompleted')->nullable();
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
        Schema::drop('reservations');
    }
}
