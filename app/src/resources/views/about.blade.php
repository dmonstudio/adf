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
            <p data-aos="fade-in" data-aos-offset="-300">
                {!! Markdown::text(nl2br($settings->get('company.zh', ''))) !!}
            </p>
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
                @php
                $internationalAwards = $settings->get('awards.international', []);
                @endphp
                @include('partial.awards', ['awards' => $internationalAwards])
            </div>
            <div class="global-awards-img" data-aos="fade-left" data-aos-offset="-50"><img src={{ url("images/awards.jpg") }}></div>
            <div class="domestic-awards" data-aos="fade-in" data-aos-offset="-50">
                <div class="section-title-sm pingFang">国内奖项 | DOMESTIC AWARDS</div>
                @php
                $nationalAwards = $settings->get('awards.national', []);
                @endphp
                @include('partial.awards', ['awards' => $nationalAwards])
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
