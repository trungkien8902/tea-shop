@extends('layouts.admin')
@section('title', 'Thêm danh mục')
@section('main')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<form method="POST" action="{{route('category.store')}}" id="formAdd">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">
        @error('name')
        <small class="help-block">{{$message}}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="is_active" class="form-label">Trạng thái</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="is_active" value="1" checked>
        <label class="form-check-label" for="inlineRadio1">Hiển thị</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="is_active" value="0">
        <label class="form-check-label" for="inlineRadio2">Ẩn</label>
    </div>
    <div style="padding-top: 20px;">
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>

@stop()
