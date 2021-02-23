<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarpras', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("id_ruangan")->unsigned();
            $table->string("nama");
            $table->string("catatan");
            $table->string("kondisi");
            $table->integer("jumlah");
            $table->timestamps();
            $table->foreign("id_ruangan")->references("id")->on("ruangan");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sarpras');
    }
}
