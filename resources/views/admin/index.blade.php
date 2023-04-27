@extends('layouts.admin')
@section('title', 'Trang chủ quản trị')
@section('main')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Thông tin quản lý</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Bảng điều khiển</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$product_count}}</h3>
                        <p>Tổng sản phẩm</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">Thông tin thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$order_count}}</h3>
                        <p>Tổng đơn hàng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">Thông tin thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$cus_count}}</h3>
                        <p>Tổng khách hàng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">Thông tin thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>
                        <p>Khách hàng ghé qua</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Thông tin thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <h3>Đơn hàng mới</h3>
        <form action="" method="GET" class="form-inline">
            <div class="row" style="padding: 20px 0;">
                <div class="col-md-4">
                    <input type="date" class="form-control" name="date_from">
                </div>
                <div class="col-md-4">
                    <input type="date" class="form-control" name="date_to">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php $n = 1; ?>
                @foreach($orders as $order)
                <tr>
                    <td>{{$n}}</td>
                    <td>{{$order->name_reciver}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                        @if($order->status)
                            <span>Chờ duyệt</span>
                        @else
                            <span>Chờ duyệt</span> 
                        @endif

                    </td>
                </tr>
                <?php $n++ ?>
                @endforeach
            </tbody>
        </table>


</section>


@stop()