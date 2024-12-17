@extends('Layout.master')
@section('title')
@section('content')

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
