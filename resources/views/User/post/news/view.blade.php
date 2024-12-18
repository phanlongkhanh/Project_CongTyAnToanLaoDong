@extends('Layout.master')
@section('title')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/breadcrumb/breadcrumb.css') }}">
    <div class="breadcrumb">
        <a href="/">Trang chủ</a>
        <span>/</span>
        <a href="{{ route('index-post-news') }}">Tin Tức</a>
        <span>/</span>
        <a href="">Bài Viết</a>

    </div>

    @isset($posts)  
            <div>
                <h1 class="text-center text-primary">{{ $posts->title }}</h1>
                <p>{!! $posts->content !!}</p>
            </div>
    @else
        <div class="container">
            <p>Bài viết không tồn tại.</p>
        </div>
    @endisset

@endsection
