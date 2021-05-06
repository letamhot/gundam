@extends('admin.layouts.layouts')

@section('title', 'Slide')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
        <div class="pull-left">
            <h2>Chỉnh sửa ảnh</h2>
        </div>
        <div class="pull-right">
            <a href="{{route('admin.slide.index')}}" class="btn btn-primary">Trở lại</a>
        </div>
    </div>
</div>
<br>
<form action="{{route('admin.slide.update',$slide->id)}}" method="post" role="form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group{{$errors->has('image')?' has-error':''}}">
                <strong>Ảnh:</strong>
                <input type="file" class="form-control" name="image" id="image" onchange="uploadFile(event)">
                <img id="image_post" src="{{asset(Storage::url($slide->image))}}" alt="" width="80px" height="80px" />
                <span class="text-danger">{{$errors->first('image')}}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
    </div>
</form>
@endsection
@push('edit_slides')
<script>
    function uploadFile(input) {
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