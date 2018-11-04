<!DOCTYPE html>
<html>

<head>
    @include('layout.head')
    
    @stack('css')
</head>

<body class="menu-hidden">
    <header>
        @include('layout.logo')
        
        @include('layout.menu')

        @include('layout.menu-icon')
    </header>

    @yield('content')

    <footer class="pingFang-thin">版权所有 ©AllSymbolDesignFirm | 京ICP备16016659号</footer>
    <div id="overlay"></div>

    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/aos/3.0.0-beta.6/aos.js"></script>

    <script>
        function toggleMenu() {
            $('body').toggleClass('menu-hidden menu-open');
            $('#overlay').toggle();
        }

        $(document).ready(function () {
            $('#overlay').on('click', toggleMenu);

            $('.menu-button').on('click', toggleMenu);
        });
    </script>
    @stack('js')
</body>

</html>
