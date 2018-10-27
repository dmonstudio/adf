<?php

use App\Models\Story;
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
        Story::query()->truncate();

        $stories = factory(Story::class, 8)->create([
            'visible' => true
        ]);

        factory(Story::class, 2)->create([
            'visible' => false
        ]);

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
