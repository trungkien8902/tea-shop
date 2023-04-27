@extends('layouts.site')
@section('title', 'Đặt hàng')
@section('main')

<div class="container" style="padding-top: 100px; padding-bottom: 100px;">
    <h2 style="padding: 30px; text-align: center"><b>Thông tin đặt hàng</b></h1>
    <div class="row" >
        <div class="col-md-4">
            <form action="{{route('checkout.submit_form')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Tên khách hàng"
                        value="{{Auth::guard('cus')->user()->name}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email"
                        value="{{Auth::guard('cus')->user()->email}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="phone" placeholder="Số điện thoại"
                        value="{{Auth::guard('cus')->user()->phone}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="address" placeholder="Địa chỉ"
                        value="{{Auth::guard('cus')->user()->address}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="order_note" placeholder="Ghi chú">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <br>
                </div>

                <div class="col-5">
                    <button type="submit" style="width:105px; margin-left: 230px" class="btn btn-primary btn-block">Đặt hàng</button>
                </div>

            </form>
        </div>

        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1; ?>
                    @foreach($cart->items as $item)
                    <tr>
                        <td>{{$n}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['price']}}. VND</td>
                        <td>{{$item['quantity']}}</td>
                    </tr>
                    <?php $n++ ?>
                    @endforeach
                    <tr>
                        <td>Tổng tiền: {{$cart->total_price}}. VND</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>




<script src="{{url('admin_assets')}}/plugins/jquery/jquery.min.js"></script>

<script src="{{url('admin_assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="{{url('admin_assets')}}/dist/js/adminlte.min.js?v=3.2.0"></script>

@stop()