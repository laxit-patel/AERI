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
            $table->String('record_id')->primary();
            $table->String('record_inward');
            $table->foreign('record_inward')->references('inward_id')->on('inwards');
            $table->String('record_test');
            $table->foreign('record_test')->references('test_id')->on('tests');
            $table->String('record_assigned_to');
            $table->foreign('record_assigned_to')->references('id')->on('users');
            $table->String('record_qty');
            $table->String('record_price');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
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
