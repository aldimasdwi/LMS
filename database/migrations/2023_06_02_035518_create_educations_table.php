<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('lulusan')->nullable();
            $table->string('jurusan_di_sekolah')->nullable();
            $table->string('pengalaman_organisasi')->nullable();
            $table->string('prestasi')->nullable();
            $table->string('asal_sekolah')->nullable();
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
        Schema::dropIfExists('education');
    }
}
