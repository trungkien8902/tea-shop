@extends('layouts.admin')
@section('title', 'Add User')
@section('main')

<form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Input your name">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Input your email">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Input your password">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="cf_password">Confirm Password</label>
                <input type="password" class="form-control" name="cf_password" placeholder="Confirm your password">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>
    <div style="padding-top: 20px;">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>


@stop()