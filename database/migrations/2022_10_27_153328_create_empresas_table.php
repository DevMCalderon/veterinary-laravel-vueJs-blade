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
            
            //datos empresa
            $table->id();
            $table->string('name',40)           ->nullable();
            $table->string('logo')              ->nullable();
            $table->string('phone',20)          ->nullable();
            $table->string('email',50)          ->nullable();
            $table->string('rfc',13)            ->nullable();
            $table->string('razon_social',50)   ->nullable();
            
            $table->unsignedBigInteger('admin_id')
                ->nullable();
                $table->foreign('admin_id')->references('id')->on('users');
            $table->unsignedBigInteger('domicilio_empresa_id')
                ->nullable();
                $table->foreign('domicilio_empresa_id')->references('id')->on('domicilios');
            $table->unsignedBigInteger('domicilio_fiscal_id')   
                ->nullable();
                $table->foreign('domicilio_fiscal_id')->references('id')->on('domicilios');

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
