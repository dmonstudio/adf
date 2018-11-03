<?php

use App\Models\Page;
use App\Models\Designer;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = Page::query()->where('type', 'home')->first();
        $page->removeMedia();

        $images = glob(resource_path('images/pages/home/*.jpg'));
        
        foreach($images as $image) {
            $page->addMedia($image)
                ->preservingOriginal()
                ->toMediaCollection('slides');
        }

        $page->settings = [
            'dialog' => [
                'zh' => '后象设计师事务所，创立于2006年，由不同专业背景的设计师组成具备综合能力的创意团队，在尊崇传统文化和东方美学的同时，强调以当代的视点和体验进行设计研究和实践为设计理念。',
                'en' => ''
            ]
        ];
        $page->save();
    }
}
