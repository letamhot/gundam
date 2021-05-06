@extends('admin.layouts.layouts')
@section('title', 'Sản Phẩm')
@section('content')
@push('select2-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sản phẩm thêm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang admin</a></li>
                        <li class="breadcrumb-item">Sản phẩm</li>
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
                        <span style="float: right;font-size:12px; margin-top:1%; width: 8rem">(<i class="fas fa-star " style=" margin:5% 0; width: 10%;
                            font-size:8px;color: red"></i>: Required field)</span>
                        <a href="{{route('admin.product.index')}}" class="btn btn-info btn-sm">Trở lại</a>
                    </div>
                    <br />
                    <div class="invoice p-3 mb-3">
                        <form method="post" action="{{ route('admin.product.qtyPost', $product->id) }}"
                            enctype="multipart/form-data" id="my-form">
                            @csrf
                            <?php $i=0; ?>
                            @foreach ($id_product as $qty)
                            <div class="form-group @error('qty{{ $i }}') has-error has-feedback @enderror">
                                <label>{{ $qty->size->name }}</label>
                                <input type="number" min="0" max="10000"
                                    class="form-control @error('qty{{ $i }}') is-invalid @enderror"
                                    name="qty{{ $i }}" value="{{ $qty->qty }}" required>
                            </div>
                            <?php $i++; ?>
                            @endforeach
                            <button type="submit" class="btn btn-primary" id="btn-submit"
                                style="border: none">Thêm</button>
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