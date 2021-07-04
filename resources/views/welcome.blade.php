<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('backend/img/logo/logo.png') }}" rel="icon">
    <title>Quản lý cửa hàng</title>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"> --}}

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('backend/assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/icon/icofont/css/icofont.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/jquery.mCustomScrollbar.css') }}">
    <style>
        .page-wrapper {
            display: flex;
            justify-content: center;
        }

        .pcoded-main-container {
            margin-top: 0px;
            /* margin-bottom: 0px; */
        }

        #topbar {
            background-color: rgb(246, 247, 251);
            position: absolute;
        }

    </style>
</head>

<body id="page-top">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="app">
        <div id="pcoded" class="pcoded">
            {{-- <div class="pcoded-overlay-box"></div> --}}
            <div class="pcoded-container navbar-wrapper">

                <nav class="navbar header-navbar pcoded-header" id="topbar"
                    v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/forget' ? false : true "
                    style="display: none;">
                    <div class=" navbar-wrapper">

                        <div class="navbar-logo">
                            <a class="mobile-menu" id="mobile-collapse" href="#!">
                                <i class="ti-menu"></i>
                            </a>
                            <a class="mobile-search morphsearch-search" href="#">
                                <i class="ti-search"></i>
                            </a>
                            <a href="index.html">
                                <img class="img-fluid" src="{{ asset('backend/assets/images/logo.png') }}"
                                    alt="Theme-Logo" />
                            </a>
                            <a class="mobile-options">
                                <i class="ti-more"></i>
                            </a>
                        </div>

                        <div class="navbar-container container-fluid">
                            <ul class="nav-left">
                                <li>
                                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                                    </div>
                                </li>

                                <li>
                                    <a href="#!" onclick="javascript:toggleFullScreen()">
                                        <i class="ti-fullscreen"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-right">
                                <li class="header-notification">
                                    <a href="#!">
                                        <i class="ti-bell"></i>
                                        <span class="badge bg-c-pink"></span>
                                    </a>
                                    <ul class="show-notification" id="notification">
                                        <li>
                                            <h6>Thông báo</h6>
                                            <label class="label label-danger">Mới</label>
                                        </li>
                                        {{-- <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center img-radius"
                                                    src="{{ asset('backend/assets/images/avatar-4.jpg') }}"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">John Doe</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                        elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li> --}}
                                        {{-- <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center img-radius"
                                                    src="{{ asset('backend/assets/images/avatar-3.jpg') }}"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Joseph William</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                        elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center img-radius"
                                                    src="{{ asset('backend/assets/images/avatar-4.jpg') }}"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Sara Soudein</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                        elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li> --}}
                                    </ul>
                                </li>
                                <li class="user-profile header-notification">
                                    <a href="#!">
                                        <img src="{{ asset('backend/assets/images/avatar-4.jpg') }}"
                                            class="img-radius" alt="User-Profile-Image">
                                        <span id="nameAdmin">Hoang Thi Duyen</span>
                                        <i class="ti-angle-down"></i>
                                    </a>
                                    <ul class="show-notification profile-notification">
                                        <li>
                                            <a href="">
                                                <router-link to="/edit-profile">
                                                    <i class="ti-user"></i> Thông tin cá nhân
                                                </router-link>
                                            </a>

                                        </li>

                                        {{-- <li>
                                            <a href="">
                                                <router-link to="/edit-store">
                                                    <i class="ti-settings"></i> Thông tin cửa hàng
                                                </router-link>
                                            </a>
                                        </li> --}}

                                        {{-- <li>
                                            <a href="#">
                                                <i class="ti-email"></i> My Messages
                                            </a>
                                        </li> --}}
                                        {{-- <li>
                                            <a href="#">
                                                <i class="ti-lock"></i> Lock Screen
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a href="">
                                                <router-link to="/logout">
                                                    <i class="ti-layout-sidebar-left"></i> Đăng xuất
                                                </router-link>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="pcoded-main-container" style="margin-top: 0px;">
                    <div class="pcoded-wrapper">
                        <nav class="pcoded-navbar" id="sidebar"
                            v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/forget' ? false : true "
                            style="display:  none;">
                            <div class=" sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a>
                            </div>
                            <div class="pcoded-inner-navbar main-menu">

                                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Số liệu</div>
                                <router-link to="/home">
                                    <ul class="pcoded-item pcoded-left-item">
                                        <li class="active">
                                            <a href="#">
                                                {{-- <router-link to="/home"> --}}
                                                <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                                <span class="pcoded-mtext" data-i18n="nav.dash.main">Thống kê</span>
                                                <span class="pcoded-mcaret"></span>
                                                {{-- </router-link> --}}
                                            </a>
                                        </li>
                                    </ul>
                                </router-link>
                                <router-link to="/pos">
                                    <ul class="pcoded-item pcoded-left-item">
                                        <li class="active">
                                            <a href="#">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.main">POS</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </router-link>
                                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Quản lý
                                </div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Nhân
                                                viên</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <router-link to="/store-employee">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Thêm nhân viên</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                            <li class=" ">
                                                <router-link to="/employee">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Xem nhân
                                                        viên</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                            <li class=" ">
                                                <router-link to="/store-position">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Thêm chức vụ</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                            <li class=" ">
                                                <router-link to="/position">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Xem chức vụ</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Nhà cung
                                                cấp</span>
                                            <span class="pcoded-mcaret"></span>
                                            </router-link>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <router-link to="/store-supplier">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Thêm nhà cung
                                                        cấp</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                            <li class=" ">
                                                <router-link to="/supplier">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Xem nhà cung
                                                        cấp</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Nhóm
                                                món</span>
                                            <span class="pcoded-mcaret"></span>
                                            </router-link>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <router-link to="/store-category">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Thêm nhóm món</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                            <li class=" ">
                                                <router-link to="/category">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Xem nhóm
                                                        món</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Món</span>
                                            <span class="pcoded-mcaret"></span>
                                            </router-link>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <router-link to="/store-product">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Thêm món</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                            <li class=" ">
                                                <router-link to="/product">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Xem món</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Chi
                                                phí</span>
                                            <span class="pcoded-mcaret"></span>
                                            </router-link>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <router-link to="/store-expense">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Thêm chi phí</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                            <li class=" ">
                                                <router-link to="/expense">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Xem chi phí</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                        </ul>
                                    </li>
                                    {{-- <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Khách
                                                hàng</span>
                                            <span class="pcoded-mcaret"></span>
                                            </router-link>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <router-link to="/store-customer">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Thêm khách hàng</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                            <li class=" ">
                                                <router-link to="/customer">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Xem khách
                                                        hàng</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                        </ul>
                                    </li> --}}
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Khách
                                                hàng</span>
                                            <span class="pcoded-mcaret"></span>
                                            </router-link>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <router-link to="/store-customer">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Thêm khách hàng</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                            <li class=" ">
                                                <router-link to="/customer">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Xem khách
                                                        hàng</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Tính
                                                lương</span>
                                            <span class="pcoded-mcaret"></span>
                                            </router-link>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <router-link to="/given-salary">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Thêm lương</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                            <li class=" ">
                                                <router-link to="/salary">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Xem lương
                                                        hàng tháng</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Hóa
                                                đơn</span>
                                            <span class="pcoded-mcaret"></span>
                                            </router-link>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <router-link to="/order">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Hóa đơn hôm nay</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                            <li class=" ">
                                                <router-link to="/searchorder">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Tìm kiếm</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </router-link>
                                            </li>
                                        </ul>
                                    </li>

                                    <router-link to="/stock">
                                        <ul class="pcoded-item pcoded-left-item">
                                            <li class="active">
                                                <a href="#">
                                                    <span class="pcoded-micon"><i
                                                            class="ti-layout-grid2-alt"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.main">Kho</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </router-link>

                                </ul>
                            </div>
                        </nav>
                        <div class="pcoded-content">
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <div class="container-fluid" id="container-wrapper">
                                            <router-view></router-view>
                                        </div>
                                    </div>

                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/assets/js/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/assets/js/popper.js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('backend/assets/js/jquery-slimscroll/jquery.slimscroll.js') }}">
    </script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('backend/assets/js/modernizr/modernizr.js') }}"></script>
    <!-- am chart -->
    <script src="{{ asset('backend/assets/pages/widget/amchart/amcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/pages/widget/amchart/serial.min.js') }}"></script>
    <!-- Todo js -->
    <script type="text/javascript " src="{{ asset('backend/assets/pages/todo/todo.js') }} "></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('backend/assets/pages/dashboard/custom-dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/assets/js/script.js') }}"></script>
    <script type="text/javascript " src="{{ asset('backend/assets/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/demo-12.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script type="text/javascript">
        let token = localStorage.getItem('token');
        let user = localStorage.getItem('user');
        console.log(user);
        if (user) {
            console.log(user);
            $("#nameAdmin").html(user);
        }

        // Pusher.logToConsole = true;

        // var pusher = new Pusher('964d59472591afed5126', {
        //     cluster: 'ap1'
        // });

        // var channel = pusher.subscribe('log-channel');
        // channel.bind('log-event', function(data) {
        //     // alert(JSON.stringify(data));
        //     $("#notification").append('\
        //             <li> \
        //                 <div class = "media" >\
        //                     <img class = "d-flex align-self-center img-radius" src = " {{ asset('backend/assets/images/avatar-4.jpg') }} " alt = "Generic placeholder image " >\
        //                     <div class = "media-body" >\
        //                         <h5 class = "notification-user" > "'+ data.title +'" </h5> \
        //                         <p class = "notification-msg" > "'+ data.message +'" </p> \
        //                         <span class = "notification-time" > "'+ data.message +'" </span> \
        //                     </div> \
        //                 </div>\
        //             </li>\
        //     ');
        // });
    </script>




    {{-- <script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/js/ruang-admin.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/js/demo/chart-area-demo.js') }}"></script> --}}
    {{-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script> --}}
</body>

</html>
