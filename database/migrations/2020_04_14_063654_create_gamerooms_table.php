<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('owner');
            $table->string('play_time');
            $table->string('play_device');
            $table->string('comment')->nullable();
            $table->string('game_title')->nullable();
            $table->boolean('vc_possible')->default(false);
            $table->boolean('available_skype')->default(false);
            $table->boolean('available_discord')->default(false);
            $table->boolean('available_twitter')->default(false);
            $table->boolean('available_ingame_vc')->default(false);
            $table->string('room_name')->default('誰でも歓迎');
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
        Schema::dropIfExists('gamerooms');
    }
}
