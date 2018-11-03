<!DOCTYPE html>
<html>

<head>
    @include('layout.head')
    <link href="https://cdn.bootcss.com/slick-carousel/1.9.0/slick.min.css" rel="stylesheet">
</head>

<body class="dark-bg">
    <header>
        @include('layout.logo')
        
        @include('layout.menu')

        @include('layout.menu-icon')
    </header>
    <div class="slick-slides">
        @foreach($slides as $slide)
        <div class="slide" style="background-image: url({{ $slide->getUrl() }})"></div>
        @endforeach
    </div>
    <div class="footer pingFang-thin">
        <div class="intro">
            {{ $settings->get('dialog.zh') }}
        </div>
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
