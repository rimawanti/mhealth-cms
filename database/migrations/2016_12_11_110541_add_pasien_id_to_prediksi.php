<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPasienIdToPrediksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('prediksis', function (Blueprint $table){
            $table->integer('pasien_id')->nullable()->after('slug')->unsigned();
            /*$table->foreign('pasien_id')->references('id')->on('pasiens')*/
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
        Schema::table('prediksis', function (Blueprint $table){

        });
    }
}
