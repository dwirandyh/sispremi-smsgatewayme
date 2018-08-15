<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->string('noPembayaran', 20);
            $table->string('idAsuransi', 20);
            $table->string('idAgen', 12);
            $table->date('tglPembayaran');
            $table->date('periodeDari');
            $table->date('periodeSampai');
            $table->integer('jumlahPembayaran');
            $table->timestamps();

            $table->primary('noPembayaran');


            $table->foreign('idAgen')
                ->references('idAgen')->on('agen');

            $table->foreign('idAsuransi')
                ->references('idAsuransi')->on('asuransi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
