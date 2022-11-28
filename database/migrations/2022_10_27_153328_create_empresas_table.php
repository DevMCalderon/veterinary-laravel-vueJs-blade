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
            $table->string('nombre',40)         ->nullable();
            $table->string('logo')              ->nullable();
            $table->string('phone',20)          ->nullable();
            $table->string('email',50)          ->nullable();
            $table->string('street',30)         ->nullable();
            $table->string('num_interior',4)    ->nullable();
            $table->string('num_exterior',4)    ->nullable();
            $table->string('cp',5)              ->nullable();
            // $table->string('address')->nullable();
            
            $table->unsignedBigInteger('state')      ->nullable();
            $table->unsignedBigInteger('city')       ->nullable();
            $table->unsignedBigInteger('country')    ->nullable();
            $table->unsignedBigInteger('admin_id')      ->nullable();
            $table->foreign('state')        ->references('id')->on('states');
            $table->foreign('city')         ->references('id')->on('cities');
            $table->foreign('country')      ->references('id')->on('countries');
            $table->foreign('admin_id')     ->references('id')->on('users');
            

            //datos facturación
            $table->string('f_rfc',13)                 ->nullable();
            $table->string('f_razon_social',50)        ->nullable();
            $table->string('f_fiscal_street',30)       ->nullable();
            $table->string('f_fiscal_num_interior',4)  ->nullable();
            $table->string('f_fiscal_num_exterior',4)  ->nullable();
            $table->string('f_fiscal_cp',5)            ->nullable();

            $table->unsignedBigInteger('f_fiscal_state')    ->nullable();
            $table->unsignedBigInteger('f_fiscal_city')     ->nullable();
            $table->unsignedBigInteger('f_fiscal_country')   ->nullable();
            $table->foreign('f_fiscal_state')      ->references('id')->on('states');
            $table->foreign('f_fiscal_city')       ->references('id')->on('cities');
            $table->foreign('f_fiscal_country')     ->references('id')->on('countries');
            
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
