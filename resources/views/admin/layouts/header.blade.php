<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <base href="{{ asset('') }}">

    <!-- add icon link -->
    <link rel="icon" href="img/logo.png" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/back-to-top.css" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        #button::after {
            content: "";
        }
    </style>
    {{-- @stack('select2css') --}}
    @stack('select2-css')

    <!-- Font Awesome-->
    {{-- <link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css"> --}}
    <script src="js/ckeditor.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @if(Auth::user()->user_type =='admin')
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>

                {{-- <img src="data:image;base64,{{Auth::user()->image}} " width="60px" height="60px"> --}}
                <div class="sidebar-brand-text mx-3">Chào,
                    {{ Auth::user()->name }}<sup></sup>
                </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Trang admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Danh sách dữ liệu
            </div>

            <!-- Nav Item - Users -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.index') }}">
                    <i class="fas fa-eye"></i>
                    <span>Tài khoản</span></a>
            </li>


            
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.comment.index')}}">
                    <i class="fas fa-comment"></i>
                    <span>Bình luận</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.category.index') }}">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                    <span>Loại hàng</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.product.index') }}">
                    <i class="fas fa-table"></i>
                    <span>Sản phẩm</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.producer.index') }}">
                    <i class="fas fa-industry"></i>
                    <span>Nhà phân phối</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.bill.index') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Hóa đơn</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.bill.billDetail') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Chi tiết hóa đơn</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.slide.index')}}">
                    <i class="fas fa-list"></i>
                    <span>Danh sách ảnh</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        @endif
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <a id="button"><i class="fas fa-arrow-up"></i>
            </a>
