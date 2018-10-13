<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>后象后台</title>

    <link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/spinkit/1.2.5/spinkit.min.css" rel="stylesheet">
    <link href={{ url( 'css/admin.css') }} rel="stylesheet"> @stack('css')
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="/images/profile_small.jpg" />
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">David Williams</span>
                                <span class="text-muted text-xs block">Art Director
                                    <b class="caret"></b>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li>
                                    <a class="dropdown-item" href="profile.html">Profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="contacts.html">Contacts</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="mailbox.html">Mailbox</a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="login.html">Logout</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            ADF
                        </div>
                    </li>
                    @include('admin.layout.menu')
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                            <i class="fa fa-bars"></i>
                        </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="快速搜索..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li style="padding: 20px">
                            <span class="m-r-sm text-muted welcome-message">{{ config('app.company') }} - 管理员后台</span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages dropdown-menu-right">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="/images/a7.jpg">
                                        </a>
                                        <div class="media-body">
                                            <small class="float-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following
                                            <strong>Monica Smith</strong>.
                                            <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="/images/a4.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following
                                            <strong>Monica Smith</strong>.
                                            <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="/images/profile.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">23h ago</small>
                                            <strong>Monica Smith</strong> love
                                            <strong>Kim Smith</strong>.
                                            <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html" class="dropdown-item">
                                            <i class="fa fa-envelope"></i>
                                            <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i>
                                <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="profile.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="float-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="grid_options.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html" class="dropdown-item">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <form action="/logout" method="post" class="form-inline">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-link">
                                    <i class="fa fa-sign-out"></i> 登出
                                </button>
                            </form>
                        </li>
                    </ul>

                </nav>
            </div>

            @yield('bct')

            @yield('content-before')

            <div class="row">
                <div class="col-lg-12">
                    {{-- <div class="wrapper wrapper-content animated fadeInRight"> --}}
                    <div class="wrapper wrapper-content">
                        @include('flash::message') @yield('content')
                    </div>

                </div>
            </div>

            <div class="footer">
                <div class="float-right">
                    <code>DMON工作室</code> 制作
                </div>
                <div>
                    {{ config('app.company') }} &copy; {{ date('Y') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/metisMenu/2.7.7/metisMenu.min.js"></script>
    <script src="https://cdn.bootcss.com/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
    <script src="https://cdn.bootcss.com/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.bootcss.com/pace/1.0.2/pace.min.js"></script>
    @if(App::environment('local'))
    <script src="https://cdn.bootcss.com/vue/2.5.16/vue.js"></script>
    @else
    <script src="https://cdn.bootcss.com/vue/2.5.16/vue.min.js"></script>
    @endif
    <script src={{ url( 'js/admin.js') }}></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    @stack('js')
</body>

</html>
