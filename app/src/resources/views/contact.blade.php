@extends('layout.master')

@section('content')
<section class="st" id="contact">
    <div class="contact-wrapper" style="background-image: url({{ $background->getFullUrl() }})">
        <div class="section-title-bg pingFang-thin">联系我们 | CONTACT</div>
        <div class="section-title-sm pingFang">设计专业咨询 | 商务合作 | 媒体合作</div>
        <div class="contact-text">
            <p class="pingFang">后象设计师事务所</p>
            <p class="pingFang-thin">
                <br>
                {{ array_get($settings, 'address.zh') }}
                <br>
                <br>
                <span class="pingFang">TEL: </span>{{ array_get($settings, 'phone') }}
                <br><span class="pingFang">FAX: </span>{{ array_get($settings, 'fax') }}
                <br><br><span class="pingFang">EMAIL:
                </span><span style="text-decoration: underline;">{{ array_get($settings, 'email') }}</span></p>
        </div>
    </div>
</section>
<section class="st" id="sns">
    <div class="sns-title">
        <p class="pingFang-thin">关注「后象」| <b class="pingFang">FOLLOW US</b></p>
    </div>
    <div class="sns-icons">
        <a href="#"><img src={{ url('images/wechat.png') }}></a>
        <a href="#"><img src={{ url('images/weibo.png') }}></a>
        <a href="#"><img src={{ url('images/instagram.png') }}></a>
    </div>
</section>
@endsection
