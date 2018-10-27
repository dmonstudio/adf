<!DOCTYPE html>
<html>

<head>
    <title>后象设计师事务所 | ALLSYMBOL DESIGN FIRM</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="后者，既是过去又是将来，象者，天下万物。以包容的心态包容不同文化，以当代的视角表现传统和经典。">
    <meta name="keywords" content="设计,设计师,设计师事务所">
    <link href="http://cdn.webfont.youziku.com/webfonts/nomal/22284/47066/5bc75cb4f629d8109cebb3dd.css" rel="stylesheet" type="text/css">
    <link href="http://cdn.webfont.youziku.com/webfonts/nomal/22284/47017/5bc76041f629d8109cebb3df.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.bootcss.com/aos/3.0.0-beta.6/aos.css" rel="stylesheet">
    <link href={{ mix('css/adf.css') }} rel="stylesheet">
    
    @stack('css')
</head>

<body>
    <header>
        <a class="logo" href={{ url('/') }}>
            @include('partial.logo')
        </a>
        <div class="menu">
            <ul class="menu-list">
                <li>
                    <div class="item-wrapper"><a class="item" href="about.html"><span class="pingFang-thin">ABOUT |
                                公司简介</span><br><span class="pingFang">ABOUT | 公司简介</span></a></div>
                </li>
                <li>
                    <div class="item-wrapper"><a class="item" href="projects.html"><span class="pingFang-thin">PROJECTS
                                | 作品</span><br><span class="pingFang">PROJECTS | 作品</span></a></div>
                </li>
                <li>
                    <div class="item-wrapper"><a class="item" href="news.html"><span class="pingFang-thin">NEWS | 动态</span><br><span
                                class="pingFang">NEWS | 动态</span></a></div>
                </li>
                <li>
                    <div class="item-wrapper"><a class="item" href="contact.html"><span class="pingFang-thin">CONTACT |
                                联系我们</span><br><span class="pingFang">CONTACT | 联系我们</span></a></div>
                </li>
                <li>
                    <div class="item-wrapper"><a class="item" href="joinus.html"><span class="pingFang-thin">JOIN US |
                                招聘</span><br><span class="pingFang">JOIN US | 招聘</span></a></div>
                </li>
            </ul>
        </div>
        <div class="menu-button">
            @include('partial.menu-icon')
        </div>
    </header>

    @yield('content')

    <footer class="pingFang-thin">版权所有 ©AllSymbolDesignFirm | 京ICP备16016659号</footer>

    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/aos/3.0.0-beta.6/aos.js"></script>

    @stack('js')
</body>
<script>
    AOS.init({
        duration: "1000",
        easing: "ease-in-out",
        anchorPlacement: "top-center"
    });
</script>

</html>
