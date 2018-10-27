<?php

use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\Models\Media;

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

        $showcases = factory(App\Models\Showcase::class, 10)->create();

        Media::where('model_type', 'showcase')->get()->each(function ($showcase) {
            $showcase->delete();
        });

        $images = glob(resource_path('images/showcases/*.jpg'));
        
        foreach($showcases as $showcase) {
            $image = array_random($images);
            $showcase->addMedia($image)
                ->preservingOriginal()
                ->toMediaCollection();
        }
    }
}
