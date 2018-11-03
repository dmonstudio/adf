<?php

use App\Models\Page;
use App\Models\Designer;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = Page::query()->whereType('about')->first();
        $page->removeMedia();

        $companyDescZh = <<<EOT
**后象设计师事务所**，创立于2006年，由不同专业背景的设计师组成具备综合能力的创意团队，在尊崇传统文化和东方美学的同时，强调以当代的视点和体验进行设计研究和实践为设计理念。

多年来团队凭借对商业形态和设计语境的独特认知，为所参与的项目注入让人耳目一新的设计元素和商业潜能，创造出艺术与商业双重成功的空间作品，同时被商界和设计界关注，连续两年入选英国Andrew Martin国际室内设计大奖（国际设计界有着“室内设计奥斯卡”美誉）、德国iF设计大奖、APIDA香港亚太室内设计大奖、金指环设计奖、CIID学会奖、金堂奖、现代装饰国际传媒奖、“金座杯”中国建筑室内设计卓越奖、亚太室内设计精英邀请赛金奖、2017年度中国室内设计影响力人物……设计事务所和主创人被国内权威专业媒体《ID+C》专栏详细解读。
EOT;

        $awards = [
            'international' => [
                [
                    'year' => 2017,
                    'title' => '亚太室内设计师精英邀请赛 餐饮空间大奖'
                ], [
                    'year' => 2017,
                    'title' => '德国iF2017设计大奖'
                ], [
                    'year' => 2014,
                    'title' => '现代装饰国际传媒奖年度杰出设计师'
                ], [
                    'year' => 2012,
                    'title' => '英国WAN Interior Design Awards终评阶段'
                ], [
                    'year' => 2011,
                    'title' => '德国iF2012设计大奖'
                ], [
                    'year' => 2011,
                    'title' => '英国ANDREW MARTIN国际室内设计大奖'
                ], [
                    'year' => 2010,
                    'title' => '英国ANDREW MARTIN国际室内设计大奖'
                ], [
                    'year' => 2010,
                    'title' => '金指环iC@ward全球室内设计大赛金奖'
                ], [
                    'year' => 2009,
                    'title' => '德国iF2009中国设计大奖'
                ], [
                    'year' => 2009,
                    'title' => 'APIDA第十七届亚太室内设计大奖银奖'
                ]
            ],
            'national' => [
                [
                    'year' => 2018,
                    'title' => '筑巢奖公共文化空间金奖'
                ], [
                    'year' => 2017,
                    'title' => '金堂奖年度最佳展示空间'
                ], [
                    'year' => 2017,
                    'title' => '中国室内设计影响力人物'
                ], [
                    'year' => 2017,
                    'title' => '光华龙腾中国装饰设计业十大杰出青年'
                ], [
                    'year' => 2016,
                    'title' => '亚太室内设计精英邀请赛金奖'
                ], [
                    'year' => 2016,
                    'title' => '室内设计 “优秀酒店空间设计作品”奖'
                ], [
                    'year' => 2014,
                    'title' => '金堂奖公益设计大奖'
                ], [
                    'year' => 2013,
                    'title' => '莱斯中国年度封面人物'
                ], [
                    'year' => 2012,
                    'title' => '金堂奖年度优秀餐饮空间设计作品奖'
                ], [
                    'year' => 2012,
                    'title' => '第三届中国国际空间环境艺术设计大赛（筑巢奖）金奖'
                ], [
                    'year' => 2012,
                    'title' => 'IAI AWARDS提名奖'
                ], [
                    'year' => 2012,
                    'title' => 'CIID第十五届中国室内设计大奖赛商业类银奖'
                ], [
                    'year' => 2012,
                    'title' => '金堂奖年度十佳样板间/售楼处设计'
                ], [
                    'year' => 2012,
                    'title' => '金外滩奖作品入围'
                ], [
                    'year' => 2011,
                    'title' => '2011-2012年度“十大最具影响力餐饮娱乐类设计机构”'
                ], [
                    'year' => 2011,
                    'title' => '第二届中国国际空间环境艺术设计大赛（筑巢奖）银奖'
                ], [
                    'year' => 2011,
                    'title' => '《现代装饰》国际传媒奖年度餐饮/酒吧空间大奖'
                ], [
                    'year' => 2011,
                    'title' => '广州设计周“金堂奖”年度十佳餐饮空间设计奖'
                ], [
                    'year' => 2011,
                    'title' => 'CIID中国建筑学会室内设计分会“2011年度设计影响力人物”提名奖'
                ], [
                    'year' => 2010,
                    'title' => '第十四届中国室内设计大奖商业空间铜奖'
                ], [
                    'year' => 2010,
                    'title' => '“中国室内设计师年度封面人物”提名奖'
                ], [
                    'year' => 2010,
                    'title' => 'IAI亚太室内设计双年大奖赛评审团特别大奖'
                ], [
                    'year' => 2010,
                    'title' => '广州国际设计周“金堂奖” 年度十佳餐饮空间设计'
                ], [
                    'year' => 2009,
                    'title' => '金外滩奖最佳餐厨空间奖'
                ], [
                    'year' => 2008,
                    'title' => '“中国室内设计年度封面人物”提名'
                ], [
                    'year' => 2008,
                    'title' => '广州国际设计周“金羊奖”中国十大室内设计师'
                ]
            ]
        ];

        $page->settings = [
            'company' => [
                'zh' => $companyDescZh,
                'en' => ''
            ],
            'awards' => $awards
        ];
        $page->save();
    }
}
