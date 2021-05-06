@extends('admin.layouts.layouts')

@section('title', 'Slide')

@section('content')
@if($message=Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 ">Danh sách ảnh</h1>
    <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
        <div class="pull-right">
            <a href="{{route('admin.slide.create')}}" class="btn btn-success float-right">Thêm ảnh</a>
            <a href="{{route('admin.dashboard')}}" class="btn btn-primary ">Trở lại</a>

        </div>
        <br />
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Slide </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th colspan="3">Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($slide as $value)

                        <tr>
                            <td><img src="{{asset(Storage::url( $value->image)) }}" width="100px" height="60px"></td>
                            <td>
                                <a href="{{ route('admin.slide.show', $value->id) }}" class="btn btn-primary"><i class="fa fa-eye" title="Xem"></i></a>
                                <a href="{{ route('admin.slide.edit', $value->id) }}" class="btn btn-warning btn-sm" type="submit"><i class="fa fa-edit" title="Sửa"></i></a>
                                <form action="{{ route('admin.slide.destroy', $value->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Are you sure to delete?')"><i
                                        class="fas fa-backspace" title="Xóa"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
