@extends('layout.master')

@section('content')
<section class="st" id="joinus">
    <div class="section-title-bg pingFang-thin">招聘信息 | JOIN US</div>
    <p class="pingFang-thin en">We want those who regard design as happiness and are willing to devote to it. We
        treasure the characteristics of curiosity and the thick-skinned in youth.</p>
    <p class="pingFang-thin">视设计为乐，为界，并心无旁骛；年轻人贵在一无所有，贵在十万个为什么，贵在“我”字，和心高气傲但死不要脸的通透！</p>
    <div class="joinus-wrapper">
        @foreach($jobs as $job)
        <div class="jd-wrapper">
            <div class="section-title-md pingFang">{{ $job->title }} | {{ $job->title_en }}</div>
            <div class="section-title-sm">岗位说明 | Tasks</div>
            <div class="jd-text">
                <p class="pingFang-thin en">
                    {!! $job->description_en !!}
                </p>
                <p class="pingFang-thin">
                    {!! $job->description !!}
                </p>
            </div>
            <div class="section-title-sm">岗位要求 | Requirements</div>
            <div class="jd-text">
                <p class="pingFang-thin en">
                    @foreach($job->requirements_en as $requirement)
                    <span class="indent">· </span> {{ $requirement }}
                    @if(!$loop->last)
                    <br>
                    @endif
                    @endforeach
                </p>
                <p class="pingFang-thin">
                    @foreach($job->requirements as $requirement)
                    <span class="indent">· </span> {{ $requirement }}
                    @if(!$loop->last)
                    <br>
                    @endif
                    @endforeach
                </p>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
