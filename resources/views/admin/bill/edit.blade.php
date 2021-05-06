@extends('admin.layouts.layouts')
@section('title', 'Hóa Đơn')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tên hóa đơn sửa: {{$bill->name}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang Admin</a></li>
                        <li class="breadcrumb-item active">Hóa dơn</li>
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
                        <a href="{{route('admin.bill.index')}}" class="btn btn-info btn-sm">Trở lại</a>
                    </div>
                    <br />
                    <div class="invoice p-3 mb-3">
                        <form action="{{route('admin.bill.update', $bill->id)}}" method="Post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group @error('status') has-error has-feedback @enderror">
                
                                <label>Trạng thái</label>
                                <select name="status" id="" class="form-control @error('status') is-invalid @enderror">
                                    <option value="0" @if($bill->status==0) {{ "selected" }} @endif>Chưa hoàn thành
                                    </option>
                                    <option value="1" @if($bill->status==1) {{ "selected" }} @endif>Hoàn thành</option>
                                </select>
                               
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>

                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Trở lại
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection