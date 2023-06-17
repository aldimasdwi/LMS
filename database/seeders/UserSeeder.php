<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Rahmat Hidayatullah',
                'email' => 'rahmat@example.com',
                'password' => bcrypt('password'),
                'status_id' => 2,
            ],
            [
                'name' => 'user',
                'email' => 'user@user.com',
                'password' => bcrypt('password'),
                'status_id' => 2,
            ],
            [
                'name' => 'Chika Fujiwara',
                'email' => 'chika@example.com',
                'password' => bcrypt('password'),
                'status_id' => 2,
                // 'gelombang' => 1,
                // 'jenis_kelamin' => 'Pria',
                // 'sudah_lulus_sekolah' => 'Sudah Lulus Sekolah',
                // 'tanggal_lahir' => '1981-03-19',
                // 'provinsi' => 'papua',
                // 'jurusan_yang_dituju' => 'Enterpreneur',
                // 'hobi' => 'sepeda',
                // 'cita_cita' => 'pengusaha',
                // 'alamat_rumah' => 'jalan besi',
            ],
        ]);
    }
}
