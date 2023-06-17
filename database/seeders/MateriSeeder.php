<?php

namespace Database\Seeders;

use App\Models\Materi;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materi::factory()->count(20)->create();
    }
}
