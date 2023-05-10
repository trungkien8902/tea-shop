@extends('layouts.admin')
@section('title', 'Danh sách danh mục')
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
            <th>Mã</th>
            <th>Tên danh mục</th>
            <th>Tổng số sản phẩm</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th class="text-right">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $cate)
        <tr>
            <td>{{$cate->id}}</td>
            <td>{{$cate->name}}</td>
            <td>{{$cate->product->count()}}</td>
            <td>
                @if($cate->is_active == 0)
                <span class="badge badge-danger">Ẩn</span>
                @else
                <span class="badge badge-success">Hiển thị</span>
                @endif
            </td>
            <td>{{$cate->created_at}}</td>
            <td class="text-right">
                <a href="{{route('category.edit', $cate->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('category.destroy', $cate->id)}}" class="btn btn-sm btn-danger btn-delete">
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