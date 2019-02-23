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
            $table->string('name');
            $table->string('tag_line')->nullable(true);
            $table->text('address');
            $table->float('lat');
            $table->float('lon');
            $table->string('phone');
            $table->text('email');
            $table->boolean('status')->default(1);
            $table->boolean('allow_on_site')->default(1);
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
        Schema::dropIfExists('arenas');
    }
}
