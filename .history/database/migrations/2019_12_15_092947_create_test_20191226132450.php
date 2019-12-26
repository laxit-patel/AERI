<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->string('test_id')->unique();
            $table->string('test_reference');
            $table->string("test_name");
            $table->string("test_material");
            $table->string("test_rate");
            $table->string("test_rate_mes");
            $table->string("test_rate_cpwd");
            $table->string("test_rate_isro");
            $table->string("test_rate_custom");
            $table->string("test_worksheet");
            $table->string("test_duration");
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
        Schema::dropIfExists('tests');
    }
}
