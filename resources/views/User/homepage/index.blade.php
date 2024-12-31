@extends('Layout.master')
@section('title')
@section('content')
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/breadcrumb/breadcrumb.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homepage/index.css') }}">

    <div class="breadcrumb">
        <a href="/">Trang chủ</a>
        <span>/</span>
    </div>

    <div class="slider">
        <div class="slides">
            <img src="{{ asset('images/h1.jpg') }}" alt="Image 3">
            <img src="{{ asset('images/h2.jpg') }}" alt="Image 1">
            <img src="{{ asset('images/h3.jpg') }}" alt="Image 2">
            <img src="{{ asset('images/h1.jpg') }}" alt="Image 1">
            <img src="{{ asset('images/h2.jpg') }}" alt="Image 2">
            <img src="{{ asset('images/h3.jpg') }}" alt="Image 3">
            <img src="{{ asset('images/h1.jpg') }}" alt="Image 3">
            <img src="{{ asset('images/h2.jpg') }}" alt="Image 1">
            <img src="{{ asset('images/h3.jpg') }}" alt="Image 2">
        </div>
        <div class="navigation">
            <button onclick="prevSlide()">&#10094;</button>
            <button onclick="nextSlide()">&#10095;</button>
        </div>
    </div>

    <hr class="bg-danger shadow-lg">




<script src="{{ asset('jss/homepage/index.js') }}"></script>
@endsection
