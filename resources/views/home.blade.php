@extends('layouts.app')
@section('content')
    <div id="home">
        <div class="row g-0">
            <div class="col-12">
				<img style="width:100%" src="{{ asset('storage/videos/home-middel.gif')}}" alt="Basketbal gif"/>
                <h1 class="video-text text-uppercase fw-bold"><b>ESBC MENHIR <br>SNEEK</b></h1>
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-12">
                            <h1 class="text-uppercase fw-bold text-center">LAATSTE NIEUWS</h1>
                            <div class="row g-0">
                                <div class="col-12">
                                    <div class="news-slider">
                                        @foreach ($news as $newsItem)
                                            <a class="text-decoration-none" href="/nieuws#{{ $newsItem->id }}">
                                                <div class="news-item-home mx-4 mb-5 mt-2">
                                                    <img src="{{ asset('storage/images/icons/Basketbal.svg') }}"
                                                        alt="">
                                                    <div class="row g-0 p-3">
                                                        <div class="col-12">
                                                            <h2 class="text-uppercase fw-bold">{{ $newsItem->title }}</h2>
                                                        </div>
                                                    </div>
                                                    <div class="news-item-home-date">
                                                        <p class="text-uppercase fw-bold">
                                                            {{ date_format($newsItem->created_at, 'j M') }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        @include('layouts.games')
                    </div>
                    <div class="row mb-5">
                        @include('layouts.sponsors')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.news-slider').slick({
                slidesToShow: 3,
                arrows: false,
                slidesToScroll: 3,
                responsive: [{
                        breakpoint: 1500,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 1000,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
            $('.sponsor-slider').slick({
                slidesToShow: 5,
                arrows: false,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                responsive: [{
                        breakpoint: 1500,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 1300,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 900,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        });
    </script>
@endsection
