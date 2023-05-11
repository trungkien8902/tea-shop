@extends('layouts.site')
@section('title', 'Giỏ hàng')
@section('main')

<div class="container" style="height: 800px; padding-top: 160px;">
<h3><b>Giỏ hàng của bạn</b></h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th class="text-right">xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php $n = 1; ?>
            @foreach($cart->items as $item)
            <tr>
                <td>{{$n}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['price']}}</td>
                <td>
                    <form action="{{route('cart.update', ['id' => $item['id']])}}" method="GET">
                        <input type="number" name="quantity" value="{{$item['quantity']}}">
                        <button type="submit" class="btn btn-primary">Update</Button>
                    </form>
                </td>
                <td class="text-right">
                    <a href="{{route('cart.remove', ['id'=>$item['id']])}}" class="btn btn-sm btn-danger btn-delete">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php $n++ ?>
            @endforeach
            <tr>
                <td>Tổng tiền: {{$cart->total_price}}</td>
            </tr>
        </tbody>
    </table>
    <div class="panel-footer">
        <hr>
        <div class="text-right">
            <a href="{{route('home.product')}}" class="btn btn-primary">Tiếp tục mua hàng</a>
            <a href="{{route('cart.clear')}}" class="btn btn-danger">Xóa hết</a>
            <a href="{{route('checkout')}}" class="btn btn-success">Đặt hàng</a>
        </div>
        <div>
            @error('error')
            <small class="help-block">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

@stop