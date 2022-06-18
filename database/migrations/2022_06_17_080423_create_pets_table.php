<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('fecha_nacimiento');
            $table->date('color')->nullable();
            $table->date('comentarios')->nullable();
            $table->date('alergias')->nullable();
            $table->unsignedBigInteger('pet_type_id')->nullable();
            $table->unsignedBigInteger('raza_id')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->timestamps();

            $table->foreign('pet_type_id')->references('id')->on('pet_types')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('raza_id')->references('id')->on('razas')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('client_id')->references('id')->on('clients')->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
