<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',40)->nullable();
            $table->string('logo')->nullable();
            $table->string('razon_social',50)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('address')->nullable();
            $table->string('rfc',13)->nullable();

            $table->unsignedBigInteger('state')->nullable();
            $table->unsignedBigInteger('city')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();

            $table->foreign('state')->references('id')->on('states');
            $table->foreign('city')->references('id')->on('cities');
            $table->foreign('admin_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
