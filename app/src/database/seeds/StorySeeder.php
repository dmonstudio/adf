<?php

use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Story::query()->truncate();

        factory(App\Models\Story::class, 10)->create();
    }
}
