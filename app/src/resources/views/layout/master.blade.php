<!DOCTYPE html>
<html>

<head>
    @include('layout.head')
    
    @stack('css')
</head>

<body>
    <header>
        @include('layout.logo')
        
        @include('layout.menu')

        @include('layout.menu-icon')
    </header>

    @yield('content')

    <footer class="pingFang-thin">版权所有 ©AllSymbolDesignFirm | 京ICP备16016659号</footer>

    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/aos/3.0.0-beta.6/aos.js"></script>

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
        });
    </script>
    @stack('js')
</body>

</html>
