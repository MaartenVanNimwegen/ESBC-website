<!doctype html>
<html lang="nl">

<body>
    @extends('layouts.app')
    @section('content')
        <div id="home">
            <div class="row">
                <div class="col-12">
                    <video style="width:100%;" muted autoplay loop>
                        <source src="{{ asset('storage/videos/home.mp4') }}" type="video/mp4" />
                    </video>
                    <h1 class="video-text text-uppercase fw-bold"><b>ESBC MENHIR <br>SNEEK</b></h1>
                    <h1 class="text-uppercase fw-bold text-center">LAATSTE NIEUWS</h1>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
