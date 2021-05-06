@extends('admin.layouts.layouts')
@section('title', 'Nhà Phân Phối')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Thêm nhà phân phối</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang admin</a></li>
                        <li class="breadcrumb-item active">Nhà phân phối</li>
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
                        <a href="{{route('admin.producer.index')}}" class="btn btn-info btn-sm">Trở lại</a>
                    </div>
                    <br />
                    <div class="invoice p-3 mb-3">
                        <form action="{{route('admin.producer.store')}}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group @error('name') has-error has-feedback @enderror col-12">

                                <label>Tên nhà phân phối</label> <i class="fas fa-star" style=" width: 10%;
                                    font-size:8px;color: red"></i>

                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}">
                                <span class="text-danger">{{$errors->first('name')}}</span>

                            </div>
                            <div class="form-group @error('address') has-error has-feedback @enderror col-12">

                                <label>Địa chỉ</label> <i class="fas fa-star" style=" width: 10%;
                                    font-size:8px;color: red"></i>

                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}">
                                <span class="text-danger">{{$errors->first('address')}}</span>

                            </div>
                            <div class="form-group @error('phone') has-error has-feedback @enderror col-12">

                                <label>Số điện thoại</label> <i class="fas fa-star" style=" width: 10%;
                                    font-size:8px;color: red"></i>

                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}">
                                <span class="text-danger">{{$errors->first('phone')}}</span>

                            </div>
                            <div class="form-group @error('taxCode') has-error has-feedback @enderror col-12">

                                <label>Mã số thuế</label> <i class="fas fa-star" style=" width: 10%;
                                    font-size:8px;color: red"></i>

                                <input type="text" class="form-control @error('taxCode') is-invalid @enderror" name="taxCode"
                                    value="{{ old('taxCode') }}">
                                <span class="text-danger">{{$errors->first('taxCode')}}</span>

                            </div>
                            <div class="form-group @error('image') has-error has-feedback @enderror">

                                <label>Ảnh đại diện nhà phân phối</label><i class="fas fa-star" style=" width: 10%;
                                font-size:8px;color: red"></i>
                                <input type="file" class="form-control input-sm" name="image" id="image" onchange="readURL(event)">
                               <img id="image_post" src="http://tabern.vietprojectgroup.com/images/user.png" alt="" width="80px" height="80px" />

                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>

                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Thoát
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('js_createProducer')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#image_post').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function() {
        readURL(this);
    });
</script>
@endpush
@endsection
