<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <base href="{{ asset('') }}">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/back-to-top.css" rel="stylesheet" type="text/css">


    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css.map">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <style>
        #button::after {
            content: "";
        }
    </style>
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            @if(!Auth::user())
                            <ul class="nav nav-pills">
                                {{--  <li><a href="#"><i class="fa fa-phone"></i> {{ Auth::user()->phone }}</a></li>
                                --}}
                                <li><a href="{{ route('gumdamstore') }}"><i class="fa fa-home">Kh??ch</i></a></li>
                            </ul>

                            @else
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> {{ Auth::user()->phone }}</a></li>
                                <li><a href="{{ route('gumdamstore') }}"><i
                                            class="fa fa-home">{{ Auth::user()->name }}</i></a></li>
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="{{ url('/auth/redirect/google') }}"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ route('gumdamstore') }}"><img src="img/logo.png" width="80px" height="60px"
                                   style="border-radius:50%" alt="" /></a>
                        </div>
                        {{-- <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa"
                                    data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa"
                                    data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="{{route('details.profile')}}"><i class="fa fa-user"></i> T??i kho???n</a></li>
                                {{-- <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li> --}}
                                {{-- <li><a href="{{ route('checkoutGet') }}"><i class="fa fa-crosshairs"></i>
                                Checkout</a> --}}
                                </li>
                                <li><a href="{{ route('cartt.index') }}"
                                        title="Gi??? h??ng b???n c?? {{ Cart::count() }} m???t h??ng"><i
                                            class="fa fa-shopping-cart"></i> Gi??? h??ng</a></li>
                                @if(!Auth::user())
                                <li><a href="{{ url('loginWatch') }}"><i class="fa fa-lock"></i> ????ng nh???p</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ route('gumdamstore') }}" class="active">Trang ch???</a></li>
                                <li class="dropdown"><a href="{{ route('cart') }}">Gi??? h??ng</a>
                                </li>
                                <li class="dropdown"><a href="#">S???n ph???m<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{ route('shop') }}">danh s??ch s???n ph???m</a></li>

                                    </ul>
                                </li>
                                @if(Auth::user())
                                <li><a href="{{ url('logout') }}" class="login-panel">????ng xu???t</a></li>
                                @endif

                            {{-- <li><a href="{{ route('contact') }}">Contact</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->
    <a id="button"><i class="fa fa-arrow-up" aria-hidden="true"></i>
    </a>
