@extends('layout.master')

@section('content')
    <section id="motto">
        <div class="motto-wrapper font" data-aos="fade-in" data-aos-offset="-50" data-aos-delay="100">
            <p class="pingFang">「后」者，既是过去又是将来，「象」者，天下万物。</p>
            <p class="pingFang-thin">以包容的心态包容不同文化，以当代的视角表现传统和经典。</p>
        </div>
    </section>
    <section class="st" id="office-photo" data-aos="fade-in" data-aos-offset="-300" data-aos-once="true">
        <div class="office-photo-wrapper" style="background-image: url({{ url('images/banner-adf-office.jpg') }});"></div>
        <p class="pingFang-thin">後象設計師事務所 辦公室 | The office of All Symbol Designers Firm</p>
    </section>
    <section class="st" id="intro">
        <div class="section-title-bg pingFang-thin" data-aos="fade-in" data-aos-offset="-100" data-aos-once="true">企业介绍
            | COMPANY</div>
        <div class="intro-wrapper pingFang-thin">
            <p data-aos="fade-in" data-aos-offset="-300"><b class="pingFang">后象设计师事务所</b>，创立于2006年，由不同专业背景的设计师组成具备综合能力的创意团队，在尊崇传统文化和东方美学的同时，强调以当代的视点和体验进行设计研究和实践为设计理念。</p>
            <p data-aos="fade-in" data-aos-offset="-300" data-aos-delay="100">多年来团队凭借对商业形态和设计语境的独特认知，为所参与的项目注入让人耳目一新的设计元素和商业潜能，创造出艺术与商业双重成功的空间作品，同时被商界和设计界关注，连续两年入选英国Andrew
                Martin国际室内设计大奖（国际设计界有着“室内设计奥斯卡”美誉）、德国iF设计大奖、APIDA香港亚太室内设计大奖、金指环设计奖、CIID学会奖、金堂奖、现代装饰国际传媒奖、“金座杯”中国建筑室内设计卓越奖、亚太室内设计精英邀请赛金奖、2017年度中国室内设计影响力人物……设计事务所和主创人被国内权威专业媒体《ID+C》专栏详细解读。</p>
        </div>
    </section>
    <section class="st" id="team">
        <div class="section-title-bg pingFang-thin" data-aos="fade-in" data-aos-offset="-100" data-aos-once="true">团队介绍
            | TEAM</div>
        <div class="team-wrapper">
            @foreach($designers as $i => $designer)
            <div class="team-member" 
                data-aos="fade-in"
                data-aos-offset="-100"
                data-aos-delay="{{ $i * 100 % 400 }}"
                data-aos-duration="1000"
                data-aos-easing="ease-in-out"
                data-aos-mirror="true"
                data-aos-anchor-placement="top-center"
            >
                <div class="team-member-photo" style="background-image: url({{ $designer->main_image }});"></div>
                <p class="team-member-name"><span class="pingFang">{{ $designer->name }} </span>{{ $designer->name_en }}</p>
                <p class="team-member-title">{{ $designer->main_title }}</p>
                <p class="team-member-title">{{ $designer->main_title_en }}</p>
            </div>
            @endforeach
        </div>
    </section>
    <section class="st" id="awards">
        <div class="section-title-bg pingFang-thin" data-aos="fade-in" data-aos-offset="-100" data-aos-once="true">奖项 |
            AWARDS</div>
        <div class="awards-wrapper">
            <div class="global-awards" data-aos="fade-in" data-aos-offset="-50">
                <div class="section-title-sm pingFang">国际奖项 | GLOBAL AWARDS</div>
                <div class="award-list">
                    <p class="award-list-left pingFang">2017<br><br>2014<br>2012<br>2011<br><br>2010<br><br>2009<br><br></p>
                    <p class="award-list-right pingFang-thin">亚太室内设计师精英邀请赛 餐饮空间大奖<br>德国iF2017设计大奖<br>现代装饰国际传媒奖年度杰出设计师
                        <br>英国WAN Interior Design Awards终评阶段<br>德国iF2012设计大奖<br>英国ANDREW MARTIN国际室内设计大奖<br>英国ANDREW
                        MARTIN国际室内设计大奖<br>金指环iC@ward全球室内设计大赛金奖<br>德国iF2009中国设计大奖<br>APIDA第十七届亚太室内设计大奖银奖</p>
                </div>
            </div>
            <div class="global-awards-img" data-aos="fade-left" data-aos-offset="-50"><img src={{ url("images/awards.jpg") }}></div>
            <div class="domestic-awards" data-aos="fade-in" data-aos-offset="-50">
                <div class="section-title-sm pingFang">国内奖项 | DOMESTIC AWARDS</div>
                <div class="award-list">
                    <p class="award-list-left pingFang">2018<br>2017<br><br><br>2016<br><br>2014<br>2013<br>2012<br><br><br><br><br><br>2011<br><br><br><br><br>2010<br><br><br><br>2009<br>2008<br></p>
                    <p class="award-list-right pingFang-thin">筑巢奖公共文化空间金奖<br>金堂奖年度最佳展示空间<br>中国室内设计影响力人物<br>光华龙腾中国装饰设计业十大杰出青年<br>亚太室内设计精英邀请赛金奖<br>室内设计
                        “优秀酒店空间设计作品”奖<br>金堂奖公益设计大奖<br>莱斯中国年度封面人物<br>金堂奖年度优秀餐饮空间设计作品奖<br>第三届中国国际空间环境艺术设计大赛（筑巢奖）金奖<br>IAI
                        AWARDS提名奖<br>CIID第十五届中国室内设计大奖赛商业类银奖<br>金堂奖年度十佳样板间/售楼处设计<br>金外滩奖作品入围<br>2011-2012年度“十大最具影响力餐饮娱乐类设计机构”<br>第二届中国国际空间环境艺术设计大赛（筑巢奖）银奖<br>《现代装饰》国际传媒奖年度餐饮/酒吧空间大奖<br>广州设计周“金堂奖”年度十佳餐饮空间设计奖<br>CIID中国建筑学会室内设计分会“2011年度设计影响力人物”提名奖<br>第十四届中国室内设计大奖商业空间铜奖<br>“中国室内设计师年度封面人物”提名奖<br>IAI亚太室内设计双年大奖赛评审团特别大奖<br>广州国际设计周“金堂奖”
                        年度十佳餐饮空间设计<br>金外滩奖最佳餐厨空间奖<br>“中国室内设计年度封面人物”提名<br>广州国际设计周“金羊奖”中国十大室内设计师<br></p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
<script>
    AOS.init({
        duration: "1000",
        easing: "ease-in-out",
        anchorPlacement: "top-center"
    });
</script>
@endpush
