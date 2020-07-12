<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_jawaban', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('komentar');

            $table->bigInteger('id_tukangkomen')->unsigned()->nullable();
            $table->foreign('id_tukangkomen')->references ('id')->on ('users') ->onDelete('cascade');
            
            $table->bigInteger('id_jawaban')->unsigned()->nullable();
            $table->foreign('id_jawaban')->references ('id')->on ('jawabans') ->onDelete('cascade');
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
        Schema::dropIfExists('komentar_jawaban');
    }
}
