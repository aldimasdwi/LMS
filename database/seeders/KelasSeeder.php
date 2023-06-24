<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelass')->insert([
            [
                'nama_kelas' => 'HTML',
                'jurusan_id' => 1,
                'slug' => 'HTML'
            ],
            [
                'nama_kelas' => 'PHP',
                'jurusan_id' => 2,
                'slug' => 'PHP'
            ]
        ]);
    }
}
