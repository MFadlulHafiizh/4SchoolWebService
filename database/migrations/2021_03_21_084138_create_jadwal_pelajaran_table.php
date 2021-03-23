<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->foreignId('id_ruangan');
            $table->foreignId('id_matpel');
            $table->foreignId('id_kelas');
            $table->foreignId('id_user');
            
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_ruangan')->references('id')->on('ruangan');
            $table->foreign('id_matpel')->references('id')->on('mata_pelajaran');
            $table->foreign('id_kelas')->references('id')->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_pelajaran');
    }
}
