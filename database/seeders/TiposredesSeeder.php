<?php

namespace Database\Seeders;

use App\Models\Tipored;
use Illuminate\Database\Seeder;

class TiposredesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipored::create(["nombre" => "Facebook"], ["nombre" => "Youtube"]);

    }
}
