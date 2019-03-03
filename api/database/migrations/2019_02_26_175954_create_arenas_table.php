<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArenasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arenas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('franchise_id');
            $table->string('arena_type_id');
            $table->text('description')->nullable(true);
            $table->boolean('status')->default(1);
            $table->text('inactive_reason')->nullable(true);
            $table->timestamps();
            $table->foreign('franchise_id')
                  ->references('id')->on('franchises')
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
        Schema::dropIfExists('arenas');
    }
}
