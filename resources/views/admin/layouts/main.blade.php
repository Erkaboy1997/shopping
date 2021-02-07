<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>
    <link rel="apple-touch-icon" href="{{ asset('admin/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/extensions/shepherd-theme-default.css')}}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/semi-dark-layout.css')}}">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/pages/dashboard-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/plugins/tour/tour.css')}}">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css')}}">

</head>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item"><a href="#">
                <i class="feather icon-list"></i><span class="menu-title" data-i18n="Content">Заказы</span></a>
                <ul class="menu-content">
                    <li><a href="">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Новости</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="#">
                    <i class="feather icon-list"></i><span class="menu-title" data-i18n="Content">Продукты</span></a>
                <ul class="menu-content">
                    <li><a href="{{ route('admin.product.index')  }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Продукты</span>
                        </a>
                    </li>

                    <li><a href="{{ route('admin.productbanner.index')  }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Главная Баннер</span>
                        </a>
                    </li>

                    <li><a href="{{ route('admin.category.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Категория</span>
                        </a>
                    </li>

                    <li><a href="{{ route('admin.categorybanner.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Категория Баннер</span>
                        </a>
                    </li>

                    <li><a href="{{ route('admin.color.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Цвет</span>
                        </a>
                    </li>

                    <li><a href="{{ route('admin.size.index')  }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Размер</span>
                        </a>
                    </li>

                    <li><a href="{{ route('admin.season.index')  }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Сезон</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="#">
                <i class="feather icon-list"></i><span class="menu-title" data-i18n="Content">Пользователи</span></a>
                <ul class="menu-content">
                    <li><a href="{{ route('admin.users.index')  }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Пользователи</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="#">
                    <i class="feather icon-list"></i><span class="menu-title" data-i18n="Content"></span>Новости</a>
                <ul class="menu-content">
                    <li><a href="{{ route('admin.news.index')  }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Новости</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="#">
                    <i class="feather icon-list"></i><span class="menu-title" data-i18n="Content">Подвал сайта</span></a>
                <ul class="menu-content">
                    <li><a href="{{ route('admin.head.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Head</span>
                        </a>
                    </li>
                    <li><a href="{{ route('admin.body.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Body</span>
                        </a>
                    </li>
                    <li><a href="{{ route('admin.login.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Вход</span>
                        </a>
                    </li>
                    <li><a href="{{ route('admin.register.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Регистрация</span>
                        </a>
                    </li>
                    <li><a href="{{ route('admin.forget.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Забыть</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="#">
                    <i class="feather icon-list"></i><span class="menu-title" data-i18n="Content">страницы сайта</span></a>
                <ul class="menu-content">
                    <li><a href="{{ route('admin.contacts.index')  }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Контакты</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="#">
                    <i class="feather icon-list"></i><span class="menu-title" data-i18n="Content">и тд</span></a>
                <ul class="menu-content">
                    <li><a href="{{ route('admin.certificates.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">СЕРТИФИКАТЫ</span>
                        </a>
                    </li>

                    <li><a href="{{ route('admin.advantages.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">ПРЕИМУЩЕСТВА</span>
                        </a>
                    </li>
                    <li><a href="{{ route('admin.advantagetext.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">ТЕКСТ ПРЕИМУЩЕСТВА</span>
                        </a>
                    </li>
                    <li><a href="{{ route('admin.soon.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">УЖЕСКОРО</span>
                        </a>
                    </li>
                    <li><a href="{{ route('admin.catalog.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">КАТАЛОГ</span>
                        </a>
                    </li>
                    <li><a href="{{ route('admin.discount.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">СКИДКА</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="#">
                <i class="feather icon-list"></i><span class="menu-title" data-i18n="Content">О нас</span></a>
                <ul class="menu-content">
                    <li><a href="{{  route('admin.we.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Баннер</span>
                        </a>
                    </li>
                    <li><a href="{{  route('admin.company.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">КОМПАНИИ</span>
                        </a>
                    </li>
                    <li><a href="{{  route('admin.history.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">ИСТОРИЯ КОМПАНИИ</span>
                        </a>
                    </li>
                    <li><a href="{{  route('admin.mission.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">МИССИЯ</span>
                        </a>
                    </li>
                    <li><a href="{{  route('admin.staff.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">ПЕРСОНАЛ</span>
                        </a>
                    </li>
                    <li><a href="{{  route('admin.stafftext.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">ПЕРСОНАЛ текст</span>
                        </a>
                    </li>
                    <li><a href="{{  route('admin.quote.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Grid">Информация</span>
                        </a>
                    </li>
                </ul>
            </li>


        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->

<div class="app-content content">

    <!-- BEGIN: Header-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                            <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                            <!--     i.ficon.feather.icon-menu-->
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon feather icon-check-square"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon feather icon-message-square"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon feather icon-mail"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calender.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon feather icon-calendar"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather icon-star warning"></i></a>
                                <div class="bookmark-input search-input">
                                    <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                    <input class="form-control input" type="text" placeholder="Explore Vuesax..." tabindex="0" data-search="template-list" />
                                    <ul class="search-list"></ul>
                                </div>
                                <!-- select.bookmark-select-->
                                <!--   option Chat-->
                                <!--   option email-->
                                <!--   option todo-->
                                <!--   option Calendar-->
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">

                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name text-bold-600">{{ Auth::user()->name  }}</span>
                                    <span class="user-status">Available</span></div><span>
                                    @php
                                        $user = \Illuminate\Support\Facades\DB::table('users')->where('id',Auth::user()->id)->first()
                                    @endphp

                                    @if(!empty($user->image))
                                        <img class="round" src="{{ asset('uploads')}}/{{ $user->image  }}" alt="avatar" height="40" width="40" /></span>
                                    @else
                                        <img class="round" src="{{ asset('frontend/img/default.svg')}}" alt="avatar" height="40" width="40" /></span>
                                    @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">

                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif


                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if (count($errors) > 0)
                                <div class="error">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li style="color: red">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>
            <!-- Dashboard Analytics end -->
        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">created by<a class="text-bold-800 grey darken-2" href="https://vendy.agency/" target="_blank">Vendy agency</a></span><span class="float-md-right d-none d-md-block"><i class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->





<script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('admin/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{ asset('admin/app-assets/vendors/js/extensions/tether.min.js')}}"></script>
<script src="{{ asset('admin/app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('admin/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{ asset('admin/app-assets/js/core/app.js')}}"></script>
<script src="{{ asset('admin/app-assets/js/scripts/components.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!--<script src="{{ asset('admin/app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>-->
<!-- END: Page JS-->
</body>
</html>
