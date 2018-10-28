<?php

use App\Models\Showcase;
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
        Showcase::query()->truncate();

        $showcases = factory(Showcase::class, 8)->create([
            'visible' => true
        ]);

        factory(Showcase::class, 2)->create([
            'visible' => false
        ]);

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
