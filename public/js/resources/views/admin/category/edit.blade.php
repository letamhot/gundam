@extends('admin.layouts.layouts')
@section('title', 'Loại hàng')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Loại hàng cần sửa: {{$category->name}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang Admin</a></li>
                        <li class="breadcrumb-item active">Loại hàng</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <a href="{{route('admin.category.index')}}" class="btn btn-info btn-sm">Trở lại</a>
                    </div>
                    <br />
                    <div class="invoice p-3 mb-3">
                        <form action="{{route('admin.category.update', $category->id)}}" method="Post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group @error('name') has-error has-feedback @enderror">

                                <label>Tên loại hàng</label> <i class="fas fa-star" style=" width: 10%;
                                    font-size:8px;color: red"></i>

                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $category->name }}">
                                <span class="text-danger">{{$errors->first('name')}}</span>

                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>

                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Thoát
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection