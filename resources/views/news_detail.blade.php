@extends('layouts.site')
@section('title', 'Tin tức')
@section('main')

<link rel="stylesheet" href="{{url('assets')}}/css/TinTuc.css" media="screen">
<section  style="top: 90px;" class="u-clearfix u-white u-section-1" id="sec-5b8e">
    <img class="u-image u-image-contain u-image-default u-image-1" src="{{url('assets')}}/images/background-tintuc3.png" alt="" data-image-width="233" data-image-height="753">
    <p class="u-align-center u-custom-font u-text u-text-default u-text-1">TIN TỨC</p>
    <img class="u-image u-image-default u-image-2" src="{{url('assets')}}/images/background-tintuc1.png" alt="" data-image-width="121" data-image-height="661">
    <div class="u-list u-list-1">
        <div class="row">
            @foreach($news as $model)
            <div class="col-4">
                <div class="">
                    <a href="">
                        <img class="u-image u-image-default u-preserve-proportions u-image-3" src="upload/{{$model->image}}" data-image-width="365" data-image-height="365">
                    </a>
                    <a href="" class="u-custom-font u-text u-text-custom-color-6 u-text-2"><b>{{$model->title}}</b></a>
                    <p class="u-custom-font u-text u-text-3">{{$model->contents}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <img class="u-image u-image-contain u-image-default u-image-12" src="{{url('assets')}}/images/background-tintuc2.png" alt="" data-image-width="251" data-image-height="851">
    <img class="u-image u-image-default u-image-13" src="{{url('assets')}}/images/background-tintuc4.png" alt="" data-image-width="199" data-image-height="708">
</section>

@stop()