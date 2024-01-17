@extends('layouts.app')
@section('content')
    <div class="nav-background"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-uppercase fw-bold">{{ $teamName }}</h1>
                <h3 class="text-uppercase fw-bold">Komende wedstrijden</h3>
                @if ($upcommingGames !== 'error')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-head">
                                <tr>
                                    <th>Datum</th>
                                    <th>Tijd</th>
                                    <th>Thuisteam</th>
                                    <th>Uitteam</th>
                                    <th>Sporthal</th>
                                </tr>
                            </thead>
                            <tbody class="table-text">
                                @foreach ($upcommingGames as $upcommingGame)
                                    <tr>
                                        <td>{{ $upcommingGame->datum }}</td>
                                        <td>{{ $upcommingGame->tijd }}</td>
                                        <td>{{ $upcommingGame->thuisPloeg }}</td>
                                        <td>{{ $upcommingGame->uitPloeg }}</td>
                                        <td>{{ $upcommingGame->sporthal }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Er is iets fout gegaan bij het ophalen van de opkomende wedstrijden bij de externe bron!</p>
                    <p>Probeer het later nog eens.</p>
                @endif

                <h3 class="text-uppercase fw-bold">Standen</h3>
                @if ($standen !== 'error')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-head">
                                <tr>
                                    <th>Positie</th>
                                    <th>Team</th>
                                    <th>Gespeeld</th>
                                    <th>Punten</th>
                                    <th>Voor</th>
                                    <th>Tegen</th>
                                    <th>Doelsaldo</th>
                                </tr>
                            </thead>
                            <tbody class="table-text">
                                @foreach ($standen as $stand)
                                    <tr>
                                        <td>{{ $stand->rang }}</td>
                                        <td>{{ $stand->afko }}</td>
                                        <td>{{ $stand->gespeeld }}</td>
                                        <td>{{ $stand->punten }}</td>
                                        <td>{{ $stand->eigenScore }}</td>
                                        <td>{{ $stand->tegenScore }}</td>
                                        <td>{{ $stand->saldo }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Er is iets fout gegaan bij het ophalen van de opkomende wedstrijden bij de externe bron!</p>
                    <p>Probeer het later nog eens.</p>
                @endif

                <h3 class="text-uppercase fw-bold">Uitslagen</h3>
                @if ($uitslagen !== 'error')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-head">
                                <tr>
                                    <th>Thuisteam</th>
                                    <th>Uitteam</th>
                                    <th>Uitslag</th>
                                </tr>
                            </thead>
                            <tbody class="table-text">
                                @foreach ($uitslagen as $uitslag)
                                    <tr>
                                        <td>{{ $uitslag->Thuisteam }}</td>
                                        <td>{{ $uitslag->Uitteam }}</td>
                                        <td>{{ $uitslag->ScoreThuis }} - {{ $uitslag->ScoreUit }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Er is iets fout gegaan bij het ophalen van de uitslagen bij de externe bron!</p>
                    <p>Probeer het later nog eens.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
