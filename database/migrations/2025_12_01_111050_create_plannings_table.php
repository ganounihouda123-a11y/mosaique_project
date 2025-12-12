<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Rename table to `plannings` for consistency with file name
        Schema::create('plannings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('heure');
            $table->string('spot');
            $table->integer('duree');
            $table->decimal('prix_HT', 12, 2);

            // Update FK to reference the `campagnes` table (plural)
            $table->foreignId('id_campagne')
                  ->constrained('campagnes')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        // Drop the pluralized table name
        Schema::dropIfExists('plannings');
    }
};
