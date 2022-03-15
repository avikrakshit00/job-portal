<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDeatilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_deatils', function (Blueprint $table) {
            $table->id();
              
            $table->string('company_name',70);
            $table->string('email',50);
            $table->string('location',49);
            $table->string('specialization',70);
            $table->string('gstn_number',20)->nullable();
            $table->date('company_estd');
   
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
        Schema::dropIfExists('company_deatils');
    }
}
