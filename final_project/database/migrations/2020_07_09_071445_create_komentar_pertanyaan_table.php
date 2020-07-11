<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarPertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_pertanyaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('komentar');

            $table->bigInteger('id_tukangkomen')->unsigned()->nullable();
            $table->foreign('id_tukangkomen')->references ('id')->on ('users') ->onDelete('cascade');

            $table->bigInteger('id_pertanyaan')->unsigned()->nullable();
            $table->foreign('id_pertanyaan')->references ('id')->on ('pertanyaans') ->onDelete('cascade');
            
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
        Schema::dropIfExists('komentar_pertanyaan');
    }
}
