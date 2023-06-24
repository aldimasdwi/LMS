<?php

namespace Database\Seeders;

use App\Models\TabMateri;
use Illuminate\Database\Seeder;

class TabMateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TabMateri::factory()->count(10)->create();
    }
}
