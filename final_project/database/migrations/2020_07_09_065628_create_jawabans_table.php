<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('jawaban');
            $table->integer('votes')->nullable();
            $table->boolean('jawaban_terbaik')->nullable();

            $table->bigInteger('id_pertanyaan')->unsigned()->nullable();
            $table->foreign('id_pertanyaan')->references ('id')->on ('pertanyaans') ->onDelete ('cascade');

            $table->bigInteger('id_penjawab')->unsigned()->nullable();
            $table->foreign ('id_penjawab')-> references ('id')->on ('users') -> onDelete ('cascade');

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
        Schema::dropIfExists('jawabans');
    }
}
