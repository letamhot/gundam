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
                    <h1 class="m-0 text-dark">Sản Phẩm Thêm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang admin</a></li>
                        <li class="breadcrumb-item">Sản Phẩm</li>
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
                        <form action="{{route('admin.product.store')}}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group @error('name') has-error has-feedback @enderror col-12">

                                <label>Tên sản phẩm</label> <i class="fas fa-star" style=" width: 10%;
                                    font-size:8px;color: red"></i>

                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}">
                                <span class="text-danger">{{$errors->first('name')}}</span>

                            </div>
                            <div class="form-group @error('category') has-error has-feedback @enderror">
        
                                <label>Tên loại hàng</label>
                                <select name="category" id="" class="form-control input-sm">
                                    @foreach ($category as $cat)
                                    
                                    <option value="{{ $cat->id }}" @if(old('category')==$cat->id)
                                        {{ "selected" }}
                                        @endif
                                        >{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->first('producer')}}</span>
                            </div>   
                            <div class="form-group @error('producer') has-error has-feedback @enderror">
        
                                <label>Nhà phân phối</label>
                                <select name="producer" id="" class="form-control input-sm">
                                    @foreach ($producer as $producers)
                                    
                                    <option value="{{ $producers->id }}" @if(old('producer')==$producers->id)
                                        {{ "selected" }}
                                        @endif
                                        >{{ $producers->name }}</option>
                                    @endforeach
                                </select>   
                                
                                <span class="text-danger">{{$errors->first('producer')}}</span>

                            </div>
                            
                            <div class="form-group @error('amount') has-error has-feedback @enderror col-12">

                                <label>Số lượng</label> <i class="fas fa-star" style=" width: 10%;
                                    font-size:8px;color: red"></i>

                                <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount"
                                    value="{{ old('amount') }}">
                                <span class="text-danger">{{$errors->first('amount')}}</span>

                            </div>
                            <div class="form-group @error('image') has-error has-feedback @enderror">

                                <label>Ảnh sản phẩm 1</label>
                                <input type="file" class="form-control input-sm" name="image" id="image" onchange="readURL(event)">
                                <img id="image_post" src="http://tabern.vietprojectgroup.com/images/user.png" alt="" width="80px" height="80px" />

                            </div>
                            <div class="form-group @error('image1') has-error has-feedback @enderror">

                                <label>Ảnh sản phẩm 2</label>
                                <input type="file" class="form-control input-sm" name="image1" id="image1" onchange="readURL1(event)">
                                <img id="image_post1" src="http://tabern.vietprojectgroup.com/images/user.png" alt="" width="80px" height="80px" />

                            </div>
                            <div class="form-group @error('image2') has-error has-feedback @enderror">

                                <label>Ảnh sản phẩm 3</label>
                                <input type="file" class="form-control input-sm" name="image2" id="image2" onchange="readURL2(event)">
                                <img id="image_post2" src="http://tabern.vietprojectgroup.com/images/user.png" alt="" width="80px" height="80px" />

                            </div>
                            <div class="form-group @error('price') has-error has-feedback @enderror">
            
                                <label>Giá sản phẩm</label>
            
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    name="price" @if(old('price')) value="{{ old('price') }}" @else
                                    value="0" @endif placeholder="Price">
            
                            </div>
                            <div class="form-group @error('new') has-error has-feedback @enderror">
                
                                <label>Sản phẩm mới</label>
                
                                <select name="new" id="" class="form-control @error('new') is-invalid @enderror">
                                    <option value="0" @if(old('new')==0) {{ "selected" }} @endif>No</option>
                                    <option value="1" @if(old('new')==1) {{ "selected" }} @endif>Yes</option>
                                </select>
                
                            </div>
                
                            <div class="form-group @error('description') has-error has-feedback @enderror">
            
                                <strong>Mô tả</strong>
            
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                    id="description" required>{!! old('description') !!}
                                </textarea>
                            </div>
                
                            <button   type="submit" class="btn btn-primary">Thêm</button>

                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Thoát
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('js_createProduct')
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
<script>
    function readURL1(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#image_post1').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image1").change(function() {
        readURL1(this);
    });
</script>
<script>
    function readURL2(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#image_post2').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image2").change(function() {
        readURL2(this);
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#size').select2({
            placeholder: "Select size"
        });
    });
</script>
@endpush
@endsection