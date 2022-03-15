<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CandidateDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CandidateDetails', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('uname');
            $table->string('iname');
            $table->string('poy');
            $table->string('percentage');
            $table->string('tboard');
            $table->string('tschool');
            $table->string('tpoy');
            $table->string('tpercentage');
            $table->string('mboard');
            $table->string('mschool');
            $table->string('mpoy');
            $table->string('mpercentage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
