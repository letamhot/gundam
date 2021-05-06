@extends('admin.layouts.layouts')

@section('title', 'Profile')

@section('content')
<style>
    label {
        color: rgba(85, 85, 85, .8);
    }
</style>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Trang admin</a> <i class="fa fa-angle-right"></i>
                    <span>Thông tin cá nhân</span>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.message')

<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Thông tin cá nhân</h2>
                    <form action="{{ route('details.update', $user->id) }}" method="POST" class="beta-form-checkout"
                        id="my-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if(!empty(Auth::user()->provider_id))
                        
                        <img id="zoom" src="{{ (Auth::user()->avatar) }}" alt="{{Auth::user()->name}}" srcset="" width="150"
                            style=" border: 1px solid #d9d9d9;" class="img-thumbnail">
                        @else
                        <img id="zoom" src="{{asset(Storage::url(Auth::user()->avatar))}}" alt="{{Auth::user()->name}}" srcset="" width="150"
                            style=" border: 1px solid #d9d9d9;" class="img-thumbnail">
                        @endif
                        <table>

                            <tr>
                                <td><label for="name">Tên người dùng: &nbsp;</label> </td>
                                <td><span
                                        style=" border: 1px solid #d9d9d9; border-radius:12px; padding: 0px 10px;">{{ Auth::user()->name }}</span>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="email">Email: &nbsp;</label> </td>
                                <td>
                                    <span style="border: 1px solid #d9d9d9; border-radius:12px; padding: 0px 10px;">
                                        {{ $user->email }}
                                    </span>
                                    <span>
                                        <a href="{{ route('email') }}" class="btn btn-info" 
                                            style="padding-left: 15px; font-size:14px; color:white; text-decoration: none;">
                                            Sửa</a>
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="phone">Số điện thoại: &nbsp;</label></td>
                                <td>
                                    <span
                                        style=" border: 1px solid #d9d9d9; border-radius:12px; padding: 0px 10px;">{{ $user->phone }}</span>
                                    <span>
                                        <a href="{{ route('phoneNumber') }}" class="btn btn-info"
                                            style="padding-left: 15px; font-size:14px; color:white; text-decoration: none;">
                                            Sửa</a>
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="phone">Mật khẩu: &nbsp;</label></td>
                                <td>
                                    <span
                                        style=" border: 1px solid #d9d9d9; border-radius:12px; padding: 0px 10px;">*********
                                    </span>
                                    <span>
                                        <a href="{{ route('password') }}" class="btn btn-info"
                                            style="padding-left: 15px; font-size:14px; color:white; text-decoration: none;">
                                            Sửa</a>
                                    </span>
                                </td>
                            </tr>
                        </table>

                        <div class="form-group @error('avatar') has-error has-feedback @enderror"
                            style="margin-bottom: 0px;">

                            <label>Ảnh đại diện:</label>
                           
                            <input id="avatar" type="file" name="avatar"
                                class="form-control @error('avatar') is-invalid @enderror" onchange="uploadFile(event)"
                                style="width: 58%; margin-left: 0px;">

                        </div><br>

                        <div class="form-input @error('name') has-error has-feedback @enderror">
                            <label for="name">Họ tên đầy đủ</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}"
                                autocomplete="name" autofocus required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div><br>

                        <div class="form-input @error('address') has-error has-feedback @enderror">
                            <label for="adress">Địa chỉ</label>
                            <textarea type="text" id="address" name="address"
                                class="form-control @error('address') is-invalid @enderror">{{ $user->address }}</textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div><br>

                        <div class="form-input @error('current_password') has-error has-feedback @enderror">
                            <label for="password">Nhập mật khẩu xác nhận</label>
                            <input type="password" id="password" name="current_password"
                                class="form-control @error('password') is-invalid @enderror" required
                                autocomplete="current_password">
                            @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <br>

                        <button type="submit" class="site-btn register-btn btn btn-info" id="btn-submit"
                            style=" float: right border: none">Sửa</button>
                        <div class="switch-login" style="float: right">
                            <a href="{{ route('admin.dashboard') }}" class="or-login btn btn-danger">Thoát</a>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

@endsection

@push('clicked')

<script type="text/javascript">
    $(document).ready(function () {
        $("#my-form").submit(function (e) {
            $("#btn-submit").attr("disabled", true);
		  $("#btn-submit").addClass('button-clicked');
            return true;
        });
    });
</script>
<script>
      function uploadFile(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function () {
                let output = document.getElementById('zoom');
                output.src = reader.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#avatar").change(function() {
        uploadFile(this);
    });
</script>

@endpush
