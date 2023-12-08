<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    @vite(['resources/scss/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>ESBC Menhir</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" height="120">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="/">
                                <h4>HOME</h4>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/teams">
                                <h4>TEAMS</h4>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/nieuws">
                                <h4>NIEUWS</h4>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/wedstrijden">
                                <h4>WEDSTRIJDEN</h4>
                            </a>
                        </li>
                        <li class="nav-item bg-red">
                            <a href="/lid-worden">
                                <h4>LID WORDEN?</h4>
                            </a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <h4 class="ms-4">
                            <a href="https://www.facebook.com/esbcmenhir/">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </h4>
                        <h4 class="ms-4">
                            <a href="https://www.instagram.com/esbcmenhir/">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </h4>
                        <h4 class="ms-4">
                            <a href="https://www.x.com/esbcmenhir/">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </h4>
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
                    <h6 class="text-uppercase fw-bold mb-4"><a href="/privacypolicy">Privacypolicy</a></h6>
                </div>
            </div>
        </div>
        <div class="text-center p-4">
            <p>
                Copyright © 2023 ESBC Menhir
            </p>
        </div>
    </footer>
</body>

</html>
