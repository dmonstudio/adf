<?php

use App\Models\Designer;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\Models\Media;

class DesignerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designer::query()->truncate();

        $designers = factory(Designer::class, 8)->create([
            'visible' => true
        ]);

        factory(Designer::class, 2)->create([
            'visible' => false
        ]);

        Media::where('model_type', 'designers')->get()->each(function ($designer) {
            $designer->delete();
        });

        $images = glob(resource_path('images/designers/*.jpg'));
        
        foreach($designers as $designer) {
            $image = array_random($images);
            $designer->addMedia($image)
                ->preservingOriginal()
                ->toMediaCollection();
        }
    }
}
