@extends('Layout.master')
@section('title')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/breadcrumb/breadcrumb.css') }}">

    <div class="breadcrumb">
        <a href="/">Trang chủ</a>
        <span>/</span>
        <a href="{{ route('index-post-news') }}">Tin Tức</a>
    </div>

    @foreach ($posts as $item)
        <div class="post mb-4 p-4 rounded shadow-sm">
            <div class="d-flex mb-3">
                <div class="post-image me-3">
                    <a href="{{ route('view-post-news', ['slug' => $item->slug]) }}">
                        <img src="{{ asset('images/' . $item->image) }}" height="350px" width="350px"
                            class="img-fluid rounded" alt="{{ $item->title }}">
                    </a>
                </div>
                <div class="post-details pl-3">
                    <a href="{{ route('view-post-news', ['slug' => $item->slug]) }}">
                        <h4 class="post-title">{{ $item->title }}</h4>
                    </a>
                    <div class="post-meta-description mb-3">
                        <p>{{ Str::limit($item->description, 150) }}</p>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('view-post-news', ['slug' => $item->slug]) }}" class="btn btn-primary">View More</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @if ($posts->isEmpty())
        <div>Không Có Bài Viết Nào</div>
    @endif

@endsection
