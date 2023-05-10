@extends('layouts.admin')
@section('title', 'Thêm mới tài khoản')
@section('main')

<form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Tên người dùng</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên của bạn">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Nhập email của bạn">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="cf_password">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" name="cf_password" placeholder="Xác nhận lại mật khẩu">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>
    <div style="padding-top: 20px;">
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>


@stop()