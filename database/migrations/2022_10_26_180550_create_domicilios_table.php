<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();

            $table->string('street',50);
            $table->string('num_interior',4)    ->nullable();
            $table->string('num_exterior',4);
            $table->string('cp',5);

            $table->unsignedBigInteger('country');
                $table->foreign('country')->references('id')->on('countries')->cascadeOnUpdate();

            $table->string('state',50);
            $table->string('city',50);
            
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
        Schema::dropIfExists('domicilios');
    }
}
