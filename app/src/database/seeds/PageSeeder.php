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
        $this->seedContactPage();
    }

    private function seedHomePage()
    {
        $images = glob(resource_path('images/pages/home/*.jpg'));
        $page = Page::query()->where('type', 'home')->first();
        
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

    private function seedContactPage()
    {
        $images = glob(resource_path('images/pages/contact/*.jpg'));
        $page = Page::query()->where('type', 'contact')->first();

        foreach($images as $image) {
            $page->addMedia($image)
                ->preservingOriginal()
                ->toMediaCollection('background');
        }

        $page->settings = [
            'address' => [
                'zh' => '武汉市武昌区和平大道三角路特1号水岸国际1栋16楼',
                'en' => ''
            ],
            'phone' => '+86 027 8891 3395',
            'fax' => '+86 027 8887 2039',
            'email' => 'am@aede.net'
        ];
        $page->save();
    }
}
