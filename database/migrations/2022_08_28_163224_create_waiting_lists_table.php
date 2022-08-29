<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaitingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waiting_lists', function (Blueprint $table) {
            $table->id();
            $table->string('date',10);
            $table->string('time',8);
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('waiting_list_status_id')->default(1);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('waiting_list_status_id')->references('id')->on('waiting_list_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waiting_lists');
    }
}
