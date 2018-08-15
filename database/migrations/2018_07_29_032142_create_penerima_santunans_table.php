<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerimaSantunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerima_santunan', function (Blueprint $table) {
            $table->increments('idPenerima');
            $table->string('idPelanggan', 12);
            $table->string('nama', 20);
            $table->string('jenisKelamin', 15);
            $table->date('tglLahir');
            $table->string('status', 15);
            $table->timestamps();

            $table->foreign('idPelanggan')
                ->references('idPelanggan')->on('pelanggan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penerima_santunan');
    }
}
