<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->string('slug')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('thumbnail')->default('/uploads/img/' . config('app.default_filename_materi_thumbnail'));
            $table->bigInteger('user_id')->nullable();
            $table->foreignId('kelas_id')->references('id')->on('kelass')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('tab_materi_id')->references('id')->on('tab_materis')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('tersedia')->nullable();
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
        Schema::dropIfExists('materi');
    }
}
