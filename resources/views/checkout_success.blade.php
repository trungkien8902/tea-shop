@extends('layouts.site')
@section('title', 'Đặt hàng thành công')
@section('main')

<div class="jumbotron" style="padding-top: 200px;">
    <div class="container">
        <h1>Đặt hàng thành công</h1>
        <p style="font-size: 20px"><b>Vui lòng check email</b> {{auth()->guard('cus')->user()->email}} ...</p>
    </div>
</div>

@stop()