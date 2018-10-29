<?php

use App\Models\Page;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\Models\Media;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::where('model_type', 'page')->get()->each(function ($page) {
            $page->delete();
        });

        $this->seedHomePage();
    }

    private function seedHomePage()
    {
        $images = glob(resource_path('images/pages/home/*.jpg'));
        $home = Page::query()->where('key', 'home')->first();
        
        foreach($images as $image) {
            $home->addMedia($image)
                ->preservingOriginal()
                ->toMediaCollection('slides');
        }

        $home->settings = [
            'dialog' => [
                'zh' => '后象设计师事务所，创立于2006年，由不同专业背景的设计师组成具备综合能力的创意团队，在尊崇传统文化和东方美学的同时，强调以当代的视点和体验进行设计研究和实践为设计理念。',
                'en' => ''
            ]
        ];
        $home->save();
    }
}
