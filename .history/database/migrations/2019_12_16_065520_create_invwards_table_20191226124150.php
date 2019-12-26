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
            $table->string('inward_id')->unique();
            $table->string('inward_reference');
            $table->string('inward_job');
            $table->string("inward_date");
            $table->string("inward_report_date");
            $table->string("inward_client");
            $table->string("inward_test");
            $table->string("inward_material");
            $table->string('inward_material_quantity');
            $table->string("inward_wordsheet");
            $table->string("inward_report");
            $table->string("inward_account");
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
