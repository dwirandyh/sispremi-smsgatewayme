<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->string('idPelanggan', 12);
            $table->string('nama', 50);
            $table->string('jenisKelamin', 18);
            $table->string('namaIbu', 20);
            $table->string('tempatLahir', 100);
            $table->date('tglLahir');
            $table->string('wargaNegara', 20);
            $table->string('statusPernikahan', 20);
            $table->text('alamat');
            $table->string('noTelepon', 20);
            $table->string('email', 50);
            $table->string('pekerjaan', 20);
            $table->string('jabatan', 20);
            $table->timestamps();

            $table->primary('idPelanggan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggan');
    }
}
