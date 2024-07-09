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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id');
            $table->foreignId('region_id');
            $table->foreignId('user_id');
            $table->string('slug')->unique();
            $table->text('player_name');
            $table->string('player_image')->nullable();
            $table->text('player_dob');
            $table->text('player_bio');
            //$table->text('player_email');
            $table->text('player_height');
            $table->text('player_preferred_foot');
            $table->boolean('player_status');
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
        Schema::dropIfExists('players');
    }
};
