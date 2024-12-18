@extends('Layout.master')
@section('title')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/breadcrumb/breadcrumb.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homepage/index.css') }}">

    <div class="breadcrumb">
        <a href="/">Trang chủ</a>
        <span>/</span>
    </div>










    <div class="slider">
        <div class="slides">
            <img src="{{ asset('images/h1.jpg') }}" alt="Image 1">
            <img src="{{ asset('images/h2.jpg') }}" alt="Image 2">
            <img src="{{ asset('images/h3.jpg') }}" alt="Image 3">
        </div>
        <div class="navigation">
            <button onclick="prevSlide()">&#10094;</button>
            <button onclick="nextSlide()">&#10095;</button>
        </div>
    </div>

    <style>
        .slider {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slides img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .navigation {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .navigation button {
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
    </style>

    <script>
        let currentIndex = 0;
        const images = document.querySelectorAll('.slides img');
        const totalImages = images.length;

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalImages;
            updateSlider();
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalImages) % totalImages;
            updateSlider();
        }

        function updateSlider() {
            const slides = document.querySelector('.slides');
            slides.style.transform = `translateX(${-currentIndex * 100}%)`;
        }
    </script>

@endsection
