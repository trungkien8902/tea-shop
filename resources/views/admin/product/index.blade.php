@extends('layouts.admin')
@section('title', 'Danh sách sản phẩm')
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
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Thể loại</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th class="text-right">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $model)
        <tr>
            <td>{{$model->id}}</td>
            <td>{{$model->name}}</td>
            <td>
                <img height="100px" src="{{url('upload')}}/{{$model->image}}" alt="product">
            </td>
            <td>{{$model->price}}. VND</td>
            <td>{{$model->cate->name}}</td>
            <td>
                @if($model->is_active == 0)
                    <span class="badge badge-danger">Ẩn</span>
                @else
                    <span class="badge badge-success">Hiển thị</span>
                @endif
            </td>
            <td>{{$model->created_at}}</td>
            <td class="text-right">
                <a href="{{route('product.edit', $model->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('product.destroy', $model->id)}}" class="btn btn-sm btn-danger btn-delete">
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
        if(confirm('Bạn có chắc muốn xóa không?'))
        {
            $('form#form-delete').submit(); 
        }
    })
</script>

@stop()