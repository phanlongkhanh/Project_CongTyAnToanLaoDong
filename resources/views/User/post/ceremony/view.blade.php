@extends('Layout.master')
@section('title')
@section('content')
<title>Bài Viết</title>

    <link rel="stylesheet" href="{{ asset('css/breadcrumb/breadcrumb.css') }}">

    <div class="breadcrumb">
        <a href="/">Trang chủ</a>
        <span>/</span>
        <a href="{{ route('index-post-ceremony') }}">Thông Tin</a>
        <span>/</span>
        <a href="">Bài Viết</a>
    </div>


    <div class="row">
        <div class="col-md-12">
            @isset($posts)
                <div class=" border border-solid-2">
                    <h1 class="text-danger text-center">{{ $posts->title }}</h1>
                    <div class="text-center"><img src="{{ asset('images/' . $posts->image) }}" height="auto" width="60%"
                            alt="{{ $posts->title }}"></div>
                    <div class="container">
                        <div class="container-fluid">
                            <p>{!! $posts->content !!}</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="container">
                    <p>Bài viết không tồn tại.</p>
                </div>
            @endisset
        </div>
      
    </div>
@endsection
