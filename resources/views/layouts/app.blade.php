<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"
        integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    @vite(['resources/scss/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="{{ asset('storage/images/logos/menhir_logo.svg') }}" type="image/x-icon">
    <title>ESBC Menhir</title>
</head>

<body>
    <header class="w-100">
        <nav class="navbar navbar-expand-xxl navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('storage/images/logos/menhir_logo.svg') }}" alt="Logo" height="120"
                        class="px-5">
                </a>
                <button class="navbar-toggler border-0 shadow-0" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <i class="fa fa-bars white-text"></i>
                </button>
                <div class="offcanvas offcanvas-end background-black" tabindex="-1" id="offcanvasDarkNavbar"
                    aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header text-right">
                        <div class="container text-end">
                            <div class="row">
                                <div class="col-12 mt-4">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="/" class="text-uppercase fw-bold fs-5">
                                    HOME
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/teams" class="text-uppercase fw-bold fs-5">
                                    TEAMS
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/trainingen" class="text-uppercase fw-bold fs-5">
                                    TRAININGEN
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/nieuws" class="text-uppercase fw-bold fs-5">
                                    NIEUWS
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/wedstrijden" class="text-uppercase fw-bold fs-5">
                                    WEDSTRIJDEN
                                </a>
                            </li>
                            <li class="nav-item bg-red">
                                <a href="/lid-worden" class="text-uppercase fw-bold fs-5">
                                    LID WORDEN?
                                </a>
                            </li>
                        </ul>
                        <div class="d-flex me-5">
                            <p class="m-4">
                                <a target="_blank" href="https://www.facebook.com/esbcmenhir/" class="fs-5">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </p>
                            <p class="m-4">
                                <a target="_blank" href="https://www.instagram.com/esbcmenhir/" class="fs-5">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </p>
                            <p class="m-4">
                                <a target="_blank" href="https://www.x.com/esbcmenhir/" class="fs-5">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>


    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto pb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Training adressen
                    </h6>
                    <p>
                        <b>Maandag:</b>
                        <br>RSG Magister Alvinus
                        <br>Almastraat 5
                        <br>8601 EW Sneek
                    </p>
                    <p>
                        <b>Woensdag:</b>
                        <br>Duinterpenhal
                        <br>Keizersmantel 1
                        <br>8607 GM Sneek
                    </p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto pb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Postadres ESBC Menhir
                    </h6>
                    <p>
                        Secrataris ESBC Menhir
                        <br>Molenkrite 3
                        <br>8608 XL Sneek
                    </p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto pb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Correspondentie
                    </h6>
                    <p>
                        <a href="mailto:info@esbcmenhir.nl">info@esbcmenhir.nl</a>
                        <br><a href="mailto:voorzitter@esbcmenhir.nl">voorzitter@esbcmenhir.nl</a>
                        <br><a href="mailto:penningmeester@esbcmenhir.nl">penningmeester@esbcmenhir.nl</a>
                        <br><a href="mailto:wedstrijdsecretaris@esbcmenhir.nl">wedstrijdsecretaris@esbcmenhir.nl</a>
                        <br><a href="mailto:secretatis@esbcmenhir.nl">secretatis@esbcmenhir.nl</a>
                    </p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 pb-4">
                    <h6 class="text-uppercase fw-bold mb-4"><a href="/privacy-policy">Privacypolicy</a></h6>
                </div>
            </div>
        </div>
        <div class="text-center p-4">
            <p>
                Copyright © 2024 ESBC Menhir - Made by <a href="https://www.linkedin.com/in/maartenvannimwegen/"
                    target="_blank">Maarten van Nimwegen</a>
            </p>
        </div>
    </footer>
</body>

</html>
