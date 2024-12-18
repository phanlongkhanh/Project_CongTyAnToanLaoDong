@extends('Layout.master')
@section('title')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/breadcrumb/breadcrumb.css') }}">

    <div class="breadcrumb">
        <a href="/">Trang chủ</a>
        <span>/</span>
        <a href="{{ route('index-post-news') }}">Tin Tức</a>
    </div>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="posts-container">
        @foreach ($posts as $item)
            <div class="post d-flex align-items-start mb-4">
                <div class="post-image me-3">
                    <a href="{{ route('view-post-ceremony', ['slug' => $item->slug]) }}">
                        <img src="{{ asset('images/' . $item->image) }}" class="img-fluid rounded"
                            alt="{{ $item->title }}">
                    </a>
                </div>
                <div class="post-details">
                    <a href="{{ route('view-post-ceremony', ['slug' => $item->slug]) }}">
                        <h5 class="post-title">{{ $item->title }}</h5>
                    </a>
                    <p class="post-meta-description">{{ Str::limit($item->description, 150) }}</p>
                    <a href="{{ route('view-post-ceremony', ['slug' => $item->slug]) }}" class="btn btn-primary mt-2">View
                        More</a>
                </div>
            </div>
        @endforeach

        @if ($posts->isEmpty())
            <div>Không Có Bài Viết Nào</div>
        @endif
    </div>


@endsection
