@extends('Layout.master')
@section('title')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/breadcrumb/breadcrumb.css') }}">

    <div class="breadcrumb">
        <a href="/">Trang chủ</a>
        <span>/</span>
    </div>

    <div class="slider">
        <div class="slides">
            <img src="https://via.placeholder.com/1000x400?text=Image+1" alt="Image 1">
            <img src="https://via.placeholder.com/1000x400?text=Image+2" alt="Image 2">
            <img src="https://via.placeholder.com/1000x400?text=Image+3" alt="Image 3">
        </div>
        <div class="navigation">
            <button onclick="prevSlide()">&#10094;</button>
            <button onclick="nextSlide()">&#10095;</button>
        </div>
    </div>






























    <script>
        const slides = document.querySelector('.slides');
        const images = document.querySelectorAll('.slides img');
        let currentIndex = 0;

        function showSlide(index) {
            if (index >= images.length) {
                currentIndex = 0;
            } else if (index < 0) {
                currentIndex = images.length - 1;
            } else {
                currentIndex = index;
            }
            const offset = -currentIndex * 100;
            slides.style.transform = `translateX(${offset}%)`;
        }

        function nextSlide() {
            showSlide(currentIndex + 1);
        }

        function prevSlide() {
            showSlide(currentIndex - 1);
        }
    </script>

@endsection
