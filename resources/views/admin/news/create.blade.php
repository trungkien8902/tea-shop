@extends('layouts.admin')
@section('title', 'Thêm mới bài viết')
@section('main')

<form method="POST" action="{{route('news.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề bài viết">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="contents">Nội dung</label>
                <textarea type="text" class="form-control" name="contents" rows="4" cols="50" placeholder="Nhập nội dung bài viết"></textarea>
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Ảnh</label>
                <input type="file" class="form-control" name="file_upload" placeholder="Tải ảnh lên"></input>
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <div class="radio">
                    <label for="status">
                        <input type="radio" name="status" value="1" checked>
                        Hiển thị
                    </label>
                    <label for="status">
                        <input type="radio" name="status" value="0">
                        Ẩn
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div style="padding-top: 20px;">
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>


@stop()