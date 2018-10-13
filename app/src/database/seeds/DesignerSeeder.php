<?php

use Illuminate\Database\Seeder;

class DesignerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Designer::query()->truncate();

        factory(App\Models\Designer::class, 10)->create();
    }
}
