<?php

use App\Models\Page;
use App\Models\Designer;
use Illuminate\Database\Seeder;

class ContactPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = Page::query()->where('type', 'contact')->first();
        $page->removeMedia();

        $images = glob(resource_path('images/pages/contact/*.jpg'));

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
