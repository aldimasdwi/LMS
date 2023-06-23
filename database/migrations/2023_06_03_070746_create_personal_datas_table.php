<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("jurusan_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('photo')->default("image/default.jpg");
            $table->string('gelombang')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('sudah_lulus_sekolah')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();
            $table->string('alamat_rumah')->nullable();
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
        Schema::dropIfExists('personal_data');
    }
}
