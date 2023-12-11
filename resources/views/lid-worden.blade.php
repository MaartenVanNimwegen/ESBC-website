<!doctype html>
<html lang="nl">

<body>
    @extends('layouts.app')
    @section('content')
        <div id="lid-worden">
            <div class="nav-background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-uppercase fw-bold">Lid worden?</h1>
                        <h2 class="fw-bold">Proeflessen</h2>
                        <p>Lijkt basketbal je leuk? Kom dan eens langs op een van onze trainingen. Je mag <b>3 keer gratis
                                meedoen</b>
                            om te kijken of je basketbal een leuke sport vindt.</p>

                        <h2 class="fw-bold">Lidmaatschap</h2>
                        <p>Lijkt het je leuk om te gaan basketballen of heb je al een aantal keren meegedaan en wil je graag
                            lid
                            worden en wedstrijden spelen? Meld je dan aan als lid van de basketbalvereniging ESBC Menhir!
                            Mocht
                            je vragen hebben of meer informatie willen dan kun je contact opnemen door een mail te sturen
                            naar
                            info@esbcmenhir.nl.</p>

                        <h2 class="fw-bold">Aanmelden nieuwe leden</h2>
                        <p>Je kunt je online aanmelden als lid van de basketbalvereniging ESBC Menhir door naar het
                            <b><a href="/inschrijfformulier">inschrijfformulier</a></b> te gaan.
                            Let op: schrijf je pas in nadat je 3 keer mee hebt getraind!
                        </p>

                        <h2 class="fw-bold">Huishoudelijk regelement</h2>
                        <p>In het huishoudelijke reglement kun je alles lezen wat je moet weten als je lid bent van/wilt
                            worden
                            van ESBC Menhir. Klik <b><a target="_blank"
                                    href="{{ asset('storage/documents/Huishoudelijk-Reglement-ESBC-Menhir.pdf') }}">hier</a></b>
                            om het huishoudelijk reglement te lezen.</p>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
