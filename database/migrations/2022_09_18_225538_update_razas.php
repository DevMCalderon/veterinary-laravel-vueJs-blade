<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRazas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('razas', function (Blueprint $table) {
            $table->unsignedBigInteger('pettype_id')->nullable()->after('id');
            $table->foreign('pettype_id')->references('id')->on('pet_types')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('razas', function (Blueprint $table) {
            $table->dropForeign(['pettype_id']);
            $table->dropColumn('pettype_id');
        });
    }
}
