<?php

use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\Models\Media;

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

        $stories = factory(App\Models\Story::class, 10)->create();

        Media::where('model_type', 'story')->get()->each(function ($story) {
            $story->delete();
        });

        $images = glob(resource_path('images/stories/*.jpg'));
        
        foreach($stories as $story) {
            $image = array_random($images);
            $story->addMedia($image)
                ->preservingOriginal()
                ->toMediaCollection();
        }
    }
}
