<?php

namespace Database\Seeders;

use App\Models\Redsocial;
use Illuminate\Database\Seeder;

class RedessocialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Redsocial::create(["contacto_id" => 1, "tipored_id" => 1, "url"=>"www.facebook.com/sardinasJL"]);
    }
}
