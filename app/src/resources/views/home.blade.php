<!DOCTYPE html>
<html>

<head>
    @include('layout.head')
    <link href="https://cdn.bootcss.com/slick-carousel/1.9.0/slick.min.css" rel="stylesheet">
</head>

<body class="dark-bg">
    <header>
        @include('partial.logo')
        
        @include('partial.menu')

        @include('partial.menu-icon')
    </header>
    <div class="slick-slides">
        @foreach($slides as $slide)
        <div class="slide" style="background-image: url({{ $slide->getUrl() }})"></div>
        @endforeach
    </div>
    <div class="footer pingFang-thin">
        <div class="intro">后象设计师事务所，创立于2006年，由不同专业背景的设计师组成具备综合能力的创意团队，在尊崇传统文化和东方美学的同时，强调以当代的视点和体验进行设计研究和实践为设计理念。</div>
        <div class="credits">版权所有 ©AllSymbolDesignFirm | 京ICP备23016250号</div>
    </div>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.menu-button').on('click', function (e) {
                var $header = $(this).parent('header');

                if ($header.hasClass('close') || $header.hasClass('open')) {
                    $header.toggleClass('close open');
                    return;
                }

                $header.toggleClass('close');
            });


            $('.slick-slides').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true,
                speed: 1500,
                fade: true,
                cssEase: 'cubic-bezier(0.895, 0.03, 0.685, 0.22)',
                autoplay: true,
                autoplaySpeed: 4500,
                pauseOnHover: false,
                pauseOnFocus: false
            });
        });
    </script>
</body>

</html>
