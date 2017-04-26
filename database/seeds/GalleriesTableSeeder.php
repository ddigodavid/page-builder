<?php

use App\Entities\Gallery;
use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::create(['title' => 'vinci_default', 'company_id' => 2]);
    }
}
