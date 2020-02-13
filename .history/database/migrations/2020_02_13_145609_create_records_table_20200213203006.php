<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->String('record_id');
            $table->String('record_inward');
            $table->foreign('record_inward')->references('inward_id')->on('inwards');
            $table->foreign("inward_client")->references('client_id')->on('clients');
            $table->String('record_test');
            $table->String('record_qty');
            $table->String('record_price');
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
        Schema::dropIfExists('records');
    }
}
