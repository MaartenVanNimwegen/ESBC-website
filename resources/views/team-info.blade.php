@extends('layouts.app')
@section('content')
    <div class="nav-background"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-uppercase fw-bold">{{ $teamName }}</h1>
                @if ($upcommingGames !== 'error')
                    <h3 class="text-uppercase fw-bold">Komende wedstrijden</h3>
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
                    <h1>Er is iets fout gegaan bij het ophalen van de opkomende wedstrijden!</h1>
                    <h1>Probeer het later nog eens.</h1>
                @endif
            </div>
        </div>
    </div>
@endsection
