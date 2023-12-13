@extends('layouts.app')
@section('content')
    <div id="home">
        <div class="row g-0">
            <div class="col-12">
                <video style="width:100%;" muted autoplay loop>
                    <source src="{{ asset('storage/videos/home.mp4') }}" type="video/mp4" />
                </video>
                <h1 class="video-text text-uppercase fw-bold"><b>ESBC MENHIR <br>SNEEK</b></h1>
                @include('layouts.news')
                @include('layouts.games')
                @include('layouts.sponsors')
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
