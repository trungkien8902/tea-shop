@extends('layouts.admin')
@section('title', 'Danh sách bài viết')
@section('main')

<form action="" class="form-inline">
    <div class="form-group">
        <input name="key" type="text" class="form-control" id="" placeholder="Tìm kiếm...">
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
    </button>
</form>
<hr>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Ảnh</th>
            <th>Nội dung</th>
            <th style="width: 300px;">Ngày tạo</th>
            <th style="width: 120px;">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $model)
        <tr>
            <td>{{$model->id}}</td>
            <td>{{$model->title}}</td>
            <td>
                <img height="100px" src="{{url('upload')}}/{{$model->image}}" alt="blog">
            </td>
            <td>{{$model->contents}}</td>
            <td>{{$model->created_at}}</td>
            <td>
                <a href="{{route('news.edit', $model->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('news.destroy', $model->id)}}" class="btn btn-sm btn-danger btn-delete">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
            
        </tr>
    </tbody>
    @endforeach
</table>

<form method="POST" action="" id="form-delete">
    @csrf @method('DELETE')
</form>

<hr>
<div>
    {{$data->appends(request()->all)->links()}}
</div>
@stop()

@section('js')

<script>
    $('.btn-delete').click(function(ev) {
        ev.preventDefault();
        var _href = $(this).attr('href');
        $('form#form-delete').attr('action', _href);
        Swal.fire({
            title: 'Bạn có chắc muốn xóa không?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Hủy',
            confirmButtonText: 'Xóa'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Xóa thành công!',
                    'success'
                )
                $('form#form-delete').submit();
            }
        })
    })
</script>

@stop()