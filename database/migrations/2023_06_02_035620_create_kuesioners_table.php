<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuesionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuesioners', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('punya_laptop')->nullable();
            $table->string('hafalan_alquran')->nullable();
            $table->string('tokoh_idola')->nullable();
            $table->string('ustad_favorit')->nullable();
            $table->string('masih_merokok')->nullable();
            $table->string('punya_pacar')->nullable();
            $table->string('pernahkah_belajar_dalam_jurusan_yang_dituju')->nullable();
            $table->string('pemahaman_agama')->nullable();
            $table->string('amalan_sunah_yang_sering_dilakukan')->nullable();
            $table->string('mengetahui_pondok_it_dari')->nullable();
            $table->string('skill_yang_dimiliki')->nullable();
            $table->string('pelajaran_yang_disukai')->nullable();
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
        Schema::dropIfExists('kuesioner');
    }
}
