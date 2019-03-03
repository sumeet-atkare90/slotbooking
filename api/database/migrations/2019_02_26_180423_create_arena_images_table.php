<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArenaImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arena_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('arena_id');
            $table->text('url');
            $table->integer('sort_no');
            $table->boolean('main')->default(0);
            $table->timestamps();
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
        Schema::dropIfExists('arena_images');
    }
}
