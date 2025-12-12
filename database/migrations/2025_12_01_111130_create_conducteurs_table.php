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
        Schema::create('conducteur', function (Blueprint $table) {
                  $table->id();
                  $table->time('heures');
                  $table->string('campagnes');
                  $table->string('spots');
                  $table->integer('duree');
                  $table->string('numero')->unique();
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
        Schema::dropIfExists('conducteur');
    }
};
