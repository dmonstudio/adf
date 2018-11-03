<?php

use App\Models\Job;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\Models\Media;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::query()->truncate();

        factory(Job::class)->create([
            'title' => '设计助理',
            'title_en' => 'Assistant Designer',
            'description' => '我们需要您能很好的配合完成方案主设在工作进程中的一切周边事务，并且致力于实现设计出品完整落地。我们不吝于向每一位志立于在设计事业上发展的同仁传递宝贵的工作经验，并给予广阔的发展空间，所以在这份工作中我们请您务必需要具备优秀的方案理解能力、严谨细致的工作态度以及良好的工作协调能力。',
            'description_en' => 'The candidate is required to work well with the project to deal with the surrounding affairs in the process of work, and is committed to achieving a complete design. We won’t hesitate to contribute our previous experience and give you extensive room for progression. So there is no doubt that you should be excellent in program comprehension, great coordinated ability and have strong sense of responsibility.',
            'requirements' => [
                '室内设计、装饰、环艺、美术或相关专业专科或以上学历',
                '2年以上室内设计相关的工作经验',
                '熟练掌握和应用3Dmax、VR、Photoshop或者AutoCAD、Coreldraw、Photoshop等设计软件',
                '具有优秀的团队协作能力与工作沟通能力，能完成团队职员与临时的客户对接沟通工作',
                '具备良好的职业精神以及良好的工作抗压心理',
                '能适应出差',
            ],
            'requirements_en' => [
                'Vocational College Degree or above in Interior Design、Decoration、Environmental Art、Art or other related fields.',
                'Minimal 2 years of experience in design firm.',
                'Proficient in 3Dmax , VR ,Photoshop , AutoCAD , Coreldraw etc.',
                'Strong sense of responsibility and teamwork. Ability to cooperate efficiently with the design team as well as third party consultants, suppliers and other related professional partners.',
                'Have professional morality and able to work under pressure.',
                       
                
                
                
                
                'Fully able to adapt to the biz travel.',
            ],
            'visible' => true
        ]);

        factory(Job::class)->create([
            'title' => '软装设计助理',
            'title_en' => 'Assistant Interior Decorator',
            'description' => '我们在项目上所作出的一切努力都是为保证设计出品的品质感与完整度。为此，我们需要您高度配合设计主案完成项目的软装陈设方案，并负责现场陈列的工作协调与问题解决沟通。在这份工作中，除美感外，我们请您务必对品质有严苛的要求，且具备严谨细致的工作态度以及良好的工作协调能力。',
            'description_en' => 'All the efforts we make on the project are to ensure the quality and completeness of the design. So we need you to cooperate with thedesigners to complete the project of soft equipment furnishings program, and is responsible for solving problem of coordination and communication. In this job, in addition to beauty, the candidates are required to be strict in the quality requirement, great coordinated ability and have strong sense of responsibility.',
            'requirements' => [
                '室内设计、装饰、环艺、美术或相关专业专科或以上学历',
                '一年以上相关从业经历，并具有与客护及供应商的钩通经验',
                '熟练操作CAD、Photoshop、PPT等相关设计软件',
                '具备较强理解与表达能力，钩通协调能力强',
                '有强烈的责任心，具备优秀的职业素养及良好的团队合作精神',
                '能适应出差',
            ],
            'requirements_en' => [
                'Vocational College Degree or above in Interior Design、Decoration、Environmental Art、Art or other related fields.',
                'Minimal 1 years of experience in related firm. Communicate with local and remote project teams, coordinate and communicate with managers, consultants, and team members',
                'Proficient in AutoCAD, Photoshop, PPT etc.',
                'Strongly ability of understanding ,expression ,communication and coordination.',
                'Have professional morality and able to work under pressure.',
                'Fully able to adapt to the biz travel.',
            ],
            'visible' => true
        ]);

        $jobs = factory(Job::class)->create([
            'visible' => false
        ]);
    }
}
