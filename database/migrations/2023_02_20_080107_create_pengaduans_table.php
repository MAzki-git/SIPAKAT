<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->string('judul_laporan');
            $table->datetime('tgl_pengaduan');
            $table->string('alamat');
            $table->char('nik', 16);
            $table->foreignId('id_kategori');
            $table->text('isi_laporan');
            $table->string('foto');
            $table->enum('status', ['0', 'proses', 'selesai']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('nik')->references('nik')->on('masyarakats');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
};
