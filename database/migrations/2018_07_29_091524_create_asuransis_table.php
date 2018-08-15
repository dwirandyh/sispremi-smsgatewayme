<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsuransisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asuransi', function (Blueprint $table) {
            $table->string('idAsuransi', 20);
            $table->string('idPelanggan', 12);
            $table->string('idAgen', 12);
            $table->string('macamAsuransi', 50);
            $table->date('mulaiAsuransi');
            $table->integer('masaAsuransi', false);
            $table->integer('masaPembayaran', false);
            $table->integer('masaLeluasa', false);
            $table->string('caraBayar', 20);
            $table->integer('nominal');
            $table->integer('biayaAngsuran');
            $table->timestamps();

            $table->foreign('idPelanggan')
                ->references('idPelanggan')->on('pelanggan');

            $table->foreign('idAgen')
                ->references('idAgen')->on('agen');

            $table->primary('idAsuransi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asuransi');
    }
}
