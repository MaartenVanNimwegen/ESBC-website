@extends('layouts.app')
@section('content')
    <div class="nav-background"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-uppercase fw-bold">Trainingen</h1>
                <p>Lijkt basketbal je leuk? Kom dan eens langs op een van onze trainingen. Je mag 3 keer gratis meedoen om
                    te kijken of je basketbal een leuke sport vindt.</p>
                <p>Hieronder treft u de trainingstijden van dit seizoen aan.</p>
                <p>Onderstaand schema geldt vanaf woensdag 6 september 2023.</p>
                <p>
                    RSG = Ingang Van Giffenstraat<br>
                    Duinterpenhal = Keizersmantel<br>
                    Bogerman = Hemdijk 47</p>
                @if ($maandag->isNotEmpty())
                    <h3 class="text-uppercase fw-bold">Maandag: (RSG)</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-head">
                                <tr>
                                    <th>Team</th>
                                    <th>Tijd</th>
                                    <th>Trainer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($maandag as $trainingMaandag)
                                    <tr>
                                        <td>{{ $trainingMaandag->team->name }}</td>
                                        <td>{{ $trainingMaandag->start->format('H:i') }} -
                                            {{ $trainingMaandag->end->format('H:i') }}</td>
                                        <td>{{ $trainingMaandag->trainer }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @endif
                @if ($dinsdag->isNotEmpty())
                    <h3 class="text-uppercase fw-bold">Dinsdag: (Bogerman)</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-head">
                                <tr>
                                    <th>Team</th>
                                    <th>Tijd</th>
                                    <th>Trainer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dinsdag as $trainingDinsdag)
                                    <tr>
                                        <td>{{ $trainingDinsdag->team->name }}</td>
                                        <td>{{ $trainingDinsdag->start->format('H:i') }} -
                                            {{ $trainingDinsdag->end->format('H:i') }}</td>
                                        <td>{{ $trainingDinsdag->trainer }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @endif
                @if ($woensdag->isNotEmpty())
                    <h3 class="text-uppercase fw-bold">Woensdag: (Duinterpenhal)</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-head">
                                <tr>
                                    <th>Team</th>
                                    <th>Tijd</th>
                                    <th>Trainer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($woensdag as $trainingWoensdag)
                                    <tr>
                                        <td>{{ $trainingWoensdag->team->name }}</td>
                                        <td>{{ $trainingWoensdag->start->format('H:i') }} -
                                            {{ $trainingWoensdag->end->format('H:i') }}</td>
                                        <td>{{ $trainingWoensdag->trainer }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @endif
                @if ($donderdag->isNotEmpty())
                    <h3 class="text-uppercase fw-bold">Donderdag: (Bogerman)</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-head">
                                <tr>
                                    <th>Team</th>
                                    <th>Tijd</th>
                                    <th>Trainer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donderdag as $trainingDonderdag)
                                    <tr>
                                        <td>{{ $trainingDonderdag->team->name }}</td>
                                        <td>{{ $trainingDonderdag->start->format('H:i') }} -
                                            {{ $trainingDonderdag->end->format('H:i') }}</td>
                                        <td>{{ $trainingDonderdag->trainer }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @endif
                @if ($vrijdag->isNotEmpty())
                    <h3 class="text-uppercase fw-bold">Vrijdag: (Locatie)</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-head">
                                <tr>
                                    <th>Team</th>
                                    <th>Tijd</th>
                                    <th>Trainer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vrijdag as $trainingVrijdag)
                                    <tr>
                                        <td>{{ $trainingVrijdag->team->name }}</td>
                                        <td>{{ $trainingVrijdag->start->format('H:i') }} -
                                            {{ $trainingVrijdag->end->format('H:i') }}</td>
                                        <td>{{ $trainingVrijdag->trainer }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @endif
                @if ($zaterdag->isNotEmpty())
                    <h3 class="text-uppercase fw-bold">Zaterdag: (Locatie)</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-head">
                                <tr>
                                    <th>Team</th>
                                    <th>Tijd</th>
                                    <th>Trainer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($zaterdag as $trainingZaterdag)
                                    <tr>
                                        <td>{{ $trainingZaterdag->team->name }}</td>
                                        <td>{{ $trainingZaterdag->start->format('H:i') }} -
                                            {{ $trainingZaterdag->end->format('H:i') }}</td>
                                        <td>{{ $trainingZaterdag->trainer }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @endif
                @if ($zondag->isNotEmpty())
                    <h3 class="text-uppercase fw-bold">Zondag: (Locatie)</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-head">
                                <tr>
                                    <th>Team</th>
                                    <th>Tijd</th>
                                    <th>Trainer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($zondag as $trainingZondag)
                                    <tr>
                                        <td>{{ $trainingZondag->team->name }}</td>
                                        <td>{{ $trainingZondag->start->format('H:i') }} -
                                            {{ $trainingZondag->end->format('H:i') }}</td>
                                        <td>{{ $trainingZondag->trainer }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <p class="fw-bold">Binnen het basketballen gelden voor het seizoen 2023/2024 de onderstaande
                    leeftijdscategorieën.</p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="bg-head">
                            <tr>
                                <th>Categorie</th>
                                <th>Geboren</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Senioren</td>
                                <td>Geboren in 2001 en eerder</td>
                            </tr>
                            <tr>
                                <td>U22</td>
                                <td>Geboren in 2002 + 2003</td>
                            </tr>
                            <tr>
                                <td>U20</td>
                                <td>Geboren in 2004 + 2005</td>
                            </tr>
                            <tr>
                                <td>U18</td>
                                <td>Geboren in 2006 + 2007</td>
                            </tr>
                            <tr>
                                <td>U16</td>
                                <td>Geboren in 2008 + 2009</td>
                            </tr>
                            <tr>
                                <td>U14</td>
                                <td>Geboren in 2010 + 2011</td>
                            </tr>
                            <tr>
                                <td>U12</td>
                                <td>Geboren in 2012 + 2013</td>
                            </tr>
                            <tr>
                                <td>U10</td>
                                <td>Geboren in 2014 + 2015</td>
                            </tr>
                            <tr>
                                <td>U08</td>
                                <td>Geboren in 2016 + 2017</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p>
                    De peildatum is 1 januari in het lopende seizoen, dus iemand die op peildatum 01-01-2024 of in de loop
                    van 2024 18 jaar wordt, kan uitkomen in de U18-competitie. Is die persoon al voor de peildatum 18 jaar
                    oud, dan dient deze in de U20-competitie uit te komen.
                </p>
                <p>
                    Wil je mee trainen in een leeftijdscategorie waar (nog) geen team voor beschikbaar is of wil je meer
                    informatie over de trainingen neem dan contact op met de wedstrijdsecretaris.
                </p>
                <p>
                    <b>Dit kan door een mail te sturen naar wedstrijdsecretaris@esbcmenhir.nl of te bellen met
                        06-15879896.</b>
                </p>
            </div>
        </div>
    </div>
@endsection
