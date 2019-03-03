<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('franchise_id');
            $table->unsignedInteger('arena_id');
            $table->datetime('booking_datetime');
            $table->boolean('status')->default(1);
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable(true);
            $table->timestamps();
            $table->foreign('franchise_id')
                  ->references('id')->on('franchises')
                  ->onDelete('cascade');
            $table->foreign('arena_id')
                  ->references('id')->on('arenas')
                  ->onDelete('cascade');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
