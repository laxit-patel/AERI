<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inwards', function (Blueprint $table) {
            $table->string('inward_id')->primary();
            $table->string('inward_reference');
            $table->string('inward_client');
            $table->foreign("inward_client")
            ->references('client_id')->on('clients');
            $table->string("inward_test");
            $table->foreign("inward_test")->references('test_id')->on('tests');
            $table->string("inward_date");
            $table->string("inward_report_date");
            $table->string("inward_report");
            $table->string("inward_description");
            $table->enum("inward_status", array('Enlisted','Lab','Report','Accounts','Paid','Delivered','Closed'));
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
        Schema::dropIfExists('invwards');
    }
}
