<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSucursalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sucursals', function (Blueprint $table) {
            $table->unsignedBigInteger('state')         ->nullable()->after('address');
            $table->unsignedBigInteger('city')          ->nullable()->after('state');
            $table->string('phone',10)                  ->nullable()->after('city');
            $table->string('email')                     ->nullable()->after('phone');
            $table->unsignedBigInteger('encargado_id')  ->nullable()->after('email');
            $table->unsignedBigInteger('empresa_id')    ->nullable()->after('encargado_id');

            $table->foreign('state')            ->references('id')->on('states')->cascadeOnUpdate();
            $table->foreign('city')             ->references('id')->on('cities')->cascadeOnUpdate();
            $table->foreign('encargado_id')     ->references('id')->on('users')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('empresa_id')       ->references('id')->on('empresas')->nullOnDelete()->cascadeOnUpdate();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sucursals', function (Blueprint $table) {
            $table->dropForeign('encargado_id');
            $table->dropForeign('state');
            $table->dropForeign('city');
            $table->dropColumn('state');
            $table->dropColumn('city');
            $table->dropColumn('encargado_id');
            $table->dropColumn('phone');
            $table->dropColumn('email');
        });
    }
}
