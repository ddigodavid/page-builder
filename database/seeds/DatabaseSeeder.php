<?php

use App\Entities\Company;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GalleriesTableSeeder::class);

        Company::create(['name' => 'Mistral']);
        Company::create(['name' => 'Vinci']);
        Company::create(['name' => 'Webeleven']);
        Company::create(['name' => 'Holos']);
    }
}
