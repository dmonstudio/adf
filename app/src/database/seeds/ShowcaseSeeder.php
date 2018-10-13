<?php

use Illuminate\Database\Seeder;

class ShowcaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Showcase::query()->truncate();

        factory(App\Models\Showcase::class, 10)->create();
    }
}
