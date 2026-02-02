<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Rename legacy singular table to plural if present
        if (Schema::hasTable('campagne') && !Schema::hasTable('campagnes')) {
            Schema::rename('campagne', 'campagnes');
        }

        // Create the pluralized table if it still doesn't exist
        if (!Schema::hasTable('campagnes')) {
            Schema::create('campagnes', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->id();
                $table->date('date_debut');
                $table->date('date_fin');
                $table->string('type');
                $table->unsignedInteger('ranking');
                $table->unsignedInteger('spot');
                // Foreign key to clients.id
                $table->foreignId('id_client')
                      ->references('id')
                      ->on('clients')
                      ->cascadeOnDelete()
                      ->cascadeOnUpdate();
                // Foreign key to categories.id
               // Foreign key to clients.id
               $table->foreignId('id_categorie')
               ->references('id')
               ->on('categories')
               ->cascadeOnDelete()
               ->cascadeOnUpdate();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('campagnes');
    }
};