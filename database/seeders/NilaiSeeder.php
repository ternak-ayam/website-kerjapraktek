<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Nilai::factory(5)->create(); 
    }
}
