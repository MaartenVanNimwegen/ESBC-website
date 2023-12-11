<!doctype html>
<html lang="nl">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<body>
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
                </div>
            </div>
        </div>
    @endsection
    <script>
        $(document).ready(function() {
            $('.slick-slider').slick({
                dots: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                responsive: [{
                        breakpoint: 1500,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: true,
                        }
                    },
                    {
                        breakpoint: 1000,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true,
                        }
                    }
                ]
            });
        });
    </script>
</body>

</html>
