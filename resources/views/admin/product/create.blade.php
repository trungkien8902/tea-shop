@extends('layouts.admin')
@section('title', 'Thêm sản phẩm')
@section('main')

<form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Mô tả sản phẩm</label>
                <textarea type="text" class="form-control" rows="4" cols="50" name="description" placeholder="Nhập mô tả sản phẩm"></textarea>
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Nội dung</label>
                <textarea type="text" class="form-control" rows="4" cols="50" name="contents" placeholder="Nhập nội dung"></textarea>
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="image">Ảnh</label>
                <input type="file" class="form-control" name="file_upload" placeholder="Tải ảnh lên"></input>
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_category">Thể loại</label>

                <select name="id_category" class="form-select">
                    <option value="">--SELECT ONE--</option>
                    @foreach($cate as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>

                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="text" class="form-control" name="price" placeholder="Nhập giá">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Số lượng</label>
                <input type="number" class="form-control" name="quantity" placeholder="Nhập số lượng">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Trạng thái</label>
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
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

@stop()