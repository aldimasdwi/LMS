<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelass', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas')->nullable();
            $table->foreignId('jurusan_id')->references('id')->on('jurusans');
            $table->string('thumbnail')->default('/uploads/img/' . config('app.default_filename_kelas_thumbnail'));
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
