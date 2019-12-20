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
            $table->timestamps();
            $table->string("inward_client");
            $table->string("inward_material");
            $table->string("inward_test");
            $table->string("inward_date");
            $table->string("inward_due_date");
            $table->enum("inward_status", array('Enlisted','Lab','Report','Accounts','Paid','Delivered','Closed'));
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
