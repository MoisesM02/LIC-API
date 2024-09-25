<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('f_matches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            //This is not the recommended way to create a foreing id, but it will do.
            $table->unsignedBigInteger('away_id');
            $table->foreign('away_id')->references('id')->on('teams');
            $table->unsignedBigInteger('home_id');
            $table->foreign('home_id')->references('id')->on('teams');

            //This is the right way to make create a foreign Id.
            $table->foreignId('tournament_id')->constrained();
            $table->integer('away_score');
            $table->integer('home_score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_matches');
    }
};
