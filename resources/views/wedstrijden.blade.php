@extends('layouts.app')
@section('content')
    <div class="nav-background"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($upcommingGames !== 'error')
                    <h1 class="text-uppercase fw-bold">Wedstrijden</h1>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-head">
                                <tr>
                                    <th>Datum</th>
                                    <th>Tijd</th>
                                    <th>Thuisteam</th>
                                    <th>Uitteam</th>
                                </tr>
                            </thead>
                            <tbody class="table-text">
                                @foreach ($upcommingGames as $upcommingGame)
                                    <tr>
                                        <td>{{ $upcommingGame->datum }}</td>
                                        <td>{{ $upcommingGame->tijd }}</td>
                                        <td>{{ $upcommingGame->thuisPloeg }}</td>
                                        <td>{{ $upcommingGame->uitPloeg }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <h1>Er is iets fout gegaan bij het ophalen van de wedstrijden!</h1>
                    <h1>Probeer het later nog eens.</h1>
                @endif
            </div>
        </div>
    </div>
@endsection
