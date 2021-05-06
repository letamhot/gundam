@extends('admin.layouts.layouts')

@section('title', 'Slide')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
        <div class="pull-left">
            <h2>Xem ảnh</h2>
        </div>
        <div class="pull-right">
            <a href="{{route('admin.slide.index')}}" class="btn btn-primary">Trở lại</a>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ảnh: </strong>
            <img src="{{asset(Storage::url( $slide->image)) }}" width="60px" height="60px">
        </div>
    </div>
</div>
@endsection
