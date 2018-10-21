<?php

use Faker\Generator as Faker;

const TITLES = [
    '后象设计事务所合伙人',
    'CIID中国建筑学会室内设计分会会员',
    '后象设计师事务所合伙人',
    '中国室内设计学会会员',
    '资深室内设计师',
    '中国百杰室内设计师',
    '后象设计师事务所合伙人',
    '华中创意+室内设计师邀请论坛策展人',
    '毕业于湖北美术学院',
    'CIID中国建筑学会室内分会会员',
    'ICIAD国际室内建筑师与设计理事会会员',
    '后象设计师事务所/创始合伙人',
    'ADF后象设计师事务所合伙人',
    '湖北省摄影家协会会员',
    '湖北省工艺美术协会核心会员',
    '后象设计师事务所（ADF) / 合伙人',
    '九三学社社员',
    '中国陈设委武汉代表处（筹）秘书长',
    '武汉历史文化建筑保护、修缮、改造先行者',
    '《华中创意+》发起人',
    '《武汉市宸筑历史建筑与文化研究院》（筹建）发起人',
    '《鹅社》（城市与文化公益组织）发起人',
    '中国美术家协会湖北分会会员',
    'IAI亚太建筑师与室内设计师联盟理事会会员',
    'ICIAD国际室内建筑师与设计师理事会会员',
    '后象设计师事务所  创始人、设计主持',
    '武汉理工大学艺术与设计学院副教授  硕士生导师',
    '武汉设计联盟学会会长',
    '中国室内装饰协会(CIDA)设计委员会委员 ',
    '中国建筑学会(CIID)理事 ',
    '中国陈设艺术专业委员(ADCC)会副主任委员 ',
    '中国建筑装饰协会(CBDA)设计委员会委员',
    '中国民族建筑研究会副主任委员',
    '武汉市文化创意产业协会副理事长'
];

const ACHIEVEMENTS = [
    '成就一',
    '成就二',
    '成就三',
    '成就四',
    '成就五',
    '成就六',
    '成就七',
];

$factory->define(App\Models\Designer::class, function (Faker $faker) {
    $titleCount = $faker->numberBetween(2, 5);
    $achievementCount = $faker->numberBetween(2, 5);

    return [
        'name' => $faker->name,
        'name_en' => $faker->words(2, true),
        'slug' => $faker->slug,
        'titles' => $faker->randomElements(TITLES, $titleCount),
        'titles_en' => $faker->sentences($titleCount),
        'achievements' => $faker->randomElements(ACHIEVEMENTS, $titleCount),
        'achievements_en' => $faker->sentences($titleCount),
        'body' => $faker->text,
        'body_en' => $faker->text,
        'visible' => $faker->boolean
    ];
});
