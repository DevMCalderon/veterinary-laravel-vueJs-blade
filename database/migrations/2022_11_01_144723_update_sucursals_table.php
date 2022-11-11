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
            $table->string('phone',10)->nullable()->after('address');
            $table->string('email')->nullable()->after('phone');
            $table->unsignedBigInteger('encargado_id')->nullable()->after('email');

            $table->foreign('encargado_id')->references('id')->on('users');
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
            $table->dropColumn('encargado_id');
            $table->dropColumn('phone');
            $table->dropColumn('email');
        });
    }
}
