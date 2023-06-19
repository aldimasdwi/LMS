<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriMateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_materis')->insert([
            'nama_kategori' => 'html',
            'jurusan_id' => 1,
            'slug' => 'html'
        ]);
    }
}
