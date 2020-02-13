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
            $table->foreign("inward_client")->references('client_id')->on('clients');
            $table->string("inward_test");
            $table->string('inward_assign_to')->default(NULL)->nullable();
            $table->foreign('inward_assign_to')->references('id')->on('users');
            $table->boolean("inward_phase_one")->default(0);
            $table->boolean("inward_phase_two")->default(0);
            $table->boolean("inward_phase_three")->default(0);
            $table->boolean("inward_phase_four")->default(0);
            $table->string("inward_date");
            $table->string("inward_report_date");
            $table->string("inward_report");
            $table->string("inward_description");
            $table->enum("inward_status", array('Enlisted','Tested','Paid','Completed'));
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
