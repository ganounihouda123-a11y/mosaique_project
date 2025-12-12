<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); // or $table->id('id_client') if you prefer a custom PK name
            $table->string('name');
            $table->string('email');
            $table->string('campagne_nom');
            $table->string('adresse'); // FIX: Laravel has no 'address' column type; use string or text
            $table->string('telephone');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('client');
    }
};
