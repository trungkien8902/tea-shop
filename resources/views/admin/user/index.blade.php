@extends('layouts.admin')
@section('title', 'List User')
@section('main')

<form action="" class="form-inline">
    <div class="form-group">
        <input name="key" type="text" class="form-control" id="" placeholder="Search By Name...">
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
            <th>Name</th>
            <th>Email</th>
            <th>Create Date</th>
            <th class="text-right">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $model)
        <tr>
            <td>{{$model->id}}</td>
            <td>{{$model->name}}</td>
            <td>{{$model->email}}</td>
            <td>{{$model->created_at}}</td>
            <td class="text-right">
                <a href="{{route('user.edit', $model->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('user.destroy', $model->id)}}" class="btn btn-sm btn-danger btn-delete">
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