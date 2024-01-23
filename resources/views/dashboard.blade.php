    @extends('layouts.adminApp')
    @section('content')
        <div id="dashboard">
            <div class="nav-background"></div>
            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <h1>Nieuws:</h1>
                <div class="table-responsive">
                    <!-- News table -->
                    {{-- ================================ --}}
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>Titel</th>
                                <th>Inhoud</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $newsItem)
                                <tr>
                                    <td>{{ $newsItem->title }}</td>
                                    <td>{{ $newsItem->description }}</td>
                                    <td>
                                        {{-- Update news article --}}
                                        <button type="button" class="btn btn-red" data-bs-toggle="modal"
                                            data-bs-target="#updateNewsModal{{ $newsItem->id }}">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <div class="modal fade" id="updateNewsModal{{ $newsItem->id }}" tabindex="-1"
                                            aria-labelledby="updateNewsModal{{ $newsItem->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="updateNewsModal{{ $newsItem->id }}Label">Pas een
                                                            nieuwsartikel aan
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('update-news', ['id' => $newsItem->id]) }}"
                                                            method="post">
                                                            @csrf

                                                            <label for="title">Titel</label>
                                                            <input type="text" class="form-control" name="title"
                                                                id="title" value="{{ $newsItem->title }}">

                                                            <label for="description">Inhoud</label>
                                                            <textarea class="form-control" name="description" id="description">{{ $newsItem->description }}</textarea>

                                                            <div class="mt-2">
                                                                <button value="{{ $newsItem->id }}" name="update-news"
                                                                    class="btn btn-red" type="submit">Pas aan</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Annuleer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{-- Delete news article --}}
                                        <button type="button" class="btn btn-red" data-bs-toggle="modal"
                                            data-bs-target="#deleteNewsModal{{ $newsItem->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <div class="modal fade" id="deleteNewsModal{{ $newsItem->id }}" tabindex="-1"
                                            aria-labelledby="deleteNewsModal{{ $newsItem->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="deleteNewsModal{{ $newsItem->id }}Label">Weet je zeker dat
                                                            je dit nieuwsartikel wilt verwijderen?
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('delete-news', ['id' => $newsItem->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <button value="{{ $newsItem->id }}" name="delete-news"
                                                                class="btn btn-red" type="submit">Ja!</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Annuleer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Add news modal -->
                    <button type="button" class="btn btn-red" data-bs-toggle="modal" data-bs-target="#addNewsModal">
                        <i class="fa fa-plus"></i>
                    </button>
                    <div class="modal fade" id="addNewsModal" tabindex="-1" aria-labelledby="addNewsModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addNewsModalLabel">Nieuws toevoegen</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('add-news') }}" method="post">
                                        @csrf
                                        <label for="title">Titel</label>
                                        <input class="form-control" type="text" name="title" id="title">

                                        <label for="description">Inhoud</label>
                                        <textarea class="form-control" name="description" id="description"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-red">Nieuws opslaan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ================================ --}}
                </div>

                {{-- Sponsor table --}}
                {{-- ================================ --}}
                <h1 class="mt-5">Sponsors:</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Logo</th>
                                <th>Url</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sponsors as $sponsor)
                                <tr>
                                    <td>{{ $sponsor->title }}</td>
                                    <td><img class="sponsor-image"
                                            src="{{ asset('storage/' . $sponsor->picture_location) }}" alt="">
                                    </td>
                                    <td><a target="_blank" href="{{ $sponsor->url }}">{{ $sponsor->url }}</a></td>
                                    <td>{{-- Update sponsor --}}
                                        <button type="button" class="btn btn-red" data-bs-toggle="modal"
                                            data-bs-target="#updateSponsorModal{{ $sponsor->id }}">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <div class="modal fade" id="updateSponsorModal{{ $sponsor->id }}"
                                            tabindex="-1" aria-labelledby="updateSponsorModal{{ $sponsor->id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="updateSponsorModal{{ $sponsor->id }}Label">Wijzig sponsor
                                                            gegevens
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('update-sponsor', ['id' => $sponsor->id]) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf

                                                            <label for="name">Naam</label>
                                                            <input type="text" class="form-control" name="name"
                                                                id="name" value="{{ $sponsor->title }}">

                                                            <label for="url">Url</label>
                                                            <input class="form-control" type="text" name="url"
                                                                id="url" value="{{ $sponsor->url }}">

                                                            <label for="url">Huidig logo</label>
                                                            <div class="logo-preview">
                                                                <img src="{{ asset('storage/' . $sponsor->picture_location) }}"
                                                                    alt="Sponsor logo">
                                                            </div>

                                                            <label for="picture">Nieuw logo</label>
                                                            <input type="file" id="picture" name="picture"
                                                                class="form-control" accept="image/*">

                                                            <div class="mt-2">
                                                                <button value="{{ $sponsor->id }}" name="update-sponsor"
                                                                    class="btn btn-red" type="submit">Pas aan</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Annuleer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{-- Delete sponsor --}}
                                        <button type="button" class="btn btn-red" data-bs-toggle="modal"
                                            data-bs-target="#deleteSponsorModal{{ $sponsor->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <div class="modal fade" id="deleteSponsorModal{{ $sponsor->id }}"
                                            tabindex="-1" aria-labelledby="deleteSponsorModal{{ $sponsor->id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="deleteSponsorModal{{ $sponsor->id }}Label">Weet je
                                                            zeker dat
                                                            je deze sponsor wilt verwijderen?
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('delete-sponsor', ['id' => $sponsor->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <button value="{{ $sponsor->id }}" name="delete-sponsor"
                                                                class="btn btn-red" type="submit">Ja!</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Annuleer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Add sponsor modal -->
                    <button type="button" class="btn btn-red" data-bs-toggle="modal" data-bs-target="#addSponsorModal">
                        <i class="fa fa-plus"></i>
                    </button>
                    <div class="modal fade" id="addSponsorModal" tabindex="-1" aria-labelledby="addSponsorModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addSponsorModalLabel">Sponsor toevoegen</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('add-sponsor') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <label for="name">Naam</label>
                                        <input class="form-control" type="text" name="name" id="name">

                                        <label for="picture">Logo</label>
                                        <input type="file" id="picture" name="picture" class="form-control"
                                            accept="image/*">

                                        <label for="url">Url</label>
                                        <input type="text" name="url" id="url" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-red">Sponsor toevoegen</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ================================ --}}

                {{-- Teams table --}}
                {{-- ================================ --}}
                <h1 class="mt-5">Teams:</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Ploeg ID</th>
                                <th>Competitie ID</th>
                                <th>Foto</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->plg_ID }}</td>
                                    <td>{{ $team->cmp_ID }}</td>
                                    <td>
                                        <img class="sponsor-image"
                                            src="{{ asset('storage/' . $team->picture_location) }}" alt="">
                                    </td>
                                    <td>{{-- Update team --}}
                                        <button type="button" class="btn btn-red" data-bs-toggle="modal"
                                            data-bs-target="#updateTeamModal{{ $team->id }}">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <div class="modal fade" id="updateTeamModal{{ $team->id }}" tabindex="-1"
                                            aria-labelledby="updateTeamModal{{ $team->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="updateTeamModal{{ $team->id }}Label">Wijzig team
                                                            gegevens
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('update-team', ['id' => $team->id]) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf

                                                            <label for="name">Naam</label>
                                                            <input type="text" class="form-control" name="name"
                                                                id="name" value="{{ $team->name }}">

                                                            <label for="plg_ID">Ploeg ID</label>
                                                            <input class="form-control" type="text" name="plg_ID"
                                                                id="plg_ID" value="{{ $team->plg_ID }}">

                                                            <label for="cmp_ID">Competitie ID</label>
                                                            <input class="form-control" type="text" name="cmp_ID"
                                                                id="cmp_ID" value="{{ $team->cmp_ID }}">

                                                            <label for="foto">Huidig logo</label>
                                                            <div class="logo-preview">
                                                                <img src="{{ asset('storage/' . $team->picture_location) }}"
                                                                    alt="Team logo">
                                                            </div>

                                                            <label for="picture">Nieuwe foto</label>
                                                            <input type="file" id="picture" name="picture"
                                                                class="form-control" accept="image/*">

                                                            <div class="mt-2">
                                                                <button value="{{ $team->id }}" name="update-team"
                                                                    class="btn btn-red" type="submit">Pas aan</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Annuleer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{-- Delete team --}}
                                        <button type="button" class="btn btn-red" data-bs-toggle="modal"
                                            data-bs-target="#deleteTeamModal{{ $team->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <div class="modal fade" id="deleteTeamModal{{ $team->id }}" tabindex="-1"
                                            aria-labelledby="deleteTeamModal{{ $team->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="deleteTeamModal{{ $team->id }}Label">Weet je
                                                            zeker dat
                                                            je dit team wilt verwijderen?
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('delete-team', ['id' => $team->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <button value="{{ $team->id }}" name="delete-team"
                                                                class="btn btn-red" type="submit">Ja!</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Annuleer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Add team modal -->
                    <button type="button" class="btn btn-red" data-bs-toggle="modal" data-bs-target="#addTeamModal">
                        <i class="fa fa-plus"></i>
                    </button>
                    <div class="modal fade" id="addTeamModal" tabindex="-1" aria-labelledby="addTeamModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addTeamModalLabel">Team toevoegen</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('add-team') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="name">Naam</label>
                                        <input class="form-control" type="text" name="name" id="name">

                                        <label for="plg_ID">Ploeg ID</label>
                                        <input class="form-control" type="text" name="plg_ID" id="plg_ID">

                                        <label for="name">Competitie ID</label>
                                        <input class="form-control" type="text" name="cmp_ID" id="cmp_ID">

                                        <label for="picture">Foto</label>
                                        <input type="file" id="picture" name="picture" class="form-control"
                                            accept="image/*">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-red">Team toevoegen</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ================================ --}}

                {{-- Trainingen table --}}
                {{-- ================================ --}}
                <h1 class="mt-5">Trainingen:</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Team</th>
                                <th>Dag</th>
                                <th>Start tijd</th>
                                <th>Eind tijd</th>
                                <th>Trainer</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainingen as $training)
                                <tr>
                                    <td>{{ $training->team->name }}</td>
                                    <td>
                                        @php
                                            switch ($training->day) {
                                                case '1':
                                                    $day = 'Maandag';
                                                    break;
                                                case '2':
                                                    $day = 'Dinsdag';
                                                    break;
                                                case '3':
                                                    $day = 'Woensdag';
                                                    break;
                                                case '4':
                                                    $day = 'Donderdag';
                                                    break;
                                                case '5':
                                                    $day = 'Vrijdag';
                                                    break;
                                                case '6':
                                                    $day = 'Zaterdag';
                                                    break;
                                                case '7':
                                                    $day = 'Zondag';
                                                    break;

                                                default:
                                                    $day = 'Onbekend';
                                                    break;
                                            }
                                        @endphp
                                        {{ $day }}
                                    </td>
                                    <td>{{ date_format($training->start, 'H:i') }}</td>
                                    <td>{{ date_format($training->end, 'H:i') }}</td>
                                    <td>{{ $training->trainer }}</td>
                                    <td>{{-- Update training --}}
                                        <button type="button" class="btn btn-red" data-bs-toggle="modal"
                                            data-bs-target="#updateTrainingModal{{ $training->id }}">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <div class="modal fade" id="updateTrainingModal{{ $training->id }}"
                                            tabindex="-1" aria-labelledby="updateTrainingModal{{ $training->id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="updateTrainingModal{{ $training->id }}Label">Wijzig
                                                            training gegevens
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('update-training', ['id' => $training->id]) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf

                                                            <label for="team">Team:</label>
                                                            <select name="team" id="team" class="form-select">
                                                                @foreach ($teams as $team)
                                                                    @if ($team->id == $training->team->id)
                                                                        <option value="{{ $team->id }}" selected>
                                                                            {{ $team->name }}
                                                                        </option>
                                                                    @else
                                                                        <option value="{{ $team->id }}">
                                                                            {{ $team->name }}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>

                                                            <label for="day">Dag:</label>
                                                            <select name="day" id="day" class="form-select">
                                                                @foreach (['Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag', 'Zondag'] as $index => $day)
                                                                    <option value="{{ $index + 1 }}"
                                                                        {{ $index + 1 == $training->day ? 'selected' : '' }}>
                                                                        {{ $day }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            <label for="start">Start:</label>
                                                            <input class="form-control" type="time" name="start"
                                                                id="start"
                                                                value="{{ date_format($training->start, 'H:i') }}">

                                                            <label for="end">End:</label>
                                                            <input class="form-control" type="time" name="end"
                                                                id="end"
                                                                value="{{ date_format($training->end, 'H:i') }}">

                                                            <label for="trainer">Trainer:</label>
                                                            <input class="form-control" type="text" name="trainer"
                                                                id="trainer" value="{{ $training->trainer }}">

                                                            <div class="mt-2">
                                                                <button value="{{ $training->id }}"
                                                                    name="update-training" class="btn btn-red"
                                                                    type="submit">Pas aan</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Annuleer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{-- Delete training --}}
                                        <button type="button" class="btn btn-red" data-bs-toggle="modal"
                                            data-bs-target="#deleteTeamModal{{ $training->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <div class="modal fade" id="deleteTeamModal{{ $training->id }}" tabindex="-1"
                                            aria-labelledby="deleteTeamModal{{ $training->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="deleteTeamModal{{ $training->id }}Label">Weet je
                                                            zeker dat
                                                            je deze training wilt verwijderen?
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('delete-training', ['id' => $training->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <button value="{{ $training->id }}" name="delete-training"
                                                                class="btn btn-red" type="submit">Ja!</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Annuleer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Add training modal -->
                    <button type="button" class="btn btn-red" data-bs-toggle="modal"
                        data-bs-target="#addTrainingModal">
                        <i class="fa fa-plus"></i>
                    </button>
                    <div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addTrainingModalLabel">Training toevoegen</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('add-training') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <label for="team">Training:</label>
                                        <select name="team" id="team" class="form-select">
                                            @foreach ($teams as $team)
                                                <option value="{{ $team->id }}">
                                                    {{ $team->name }}</option>
                                            @endforeach
                                        </select>

                                        <label for="day">Dag:</label>
                                        <select name="day" id="day" class="form-select">
                                            <option value="1">Maandag</option>
                                            <option value="2">Dinsdag</option>
                                            <option value="3">Woensdag</option>
                                            <option value="4">Donderdag</option>
                                            <option value="5">Vrijdag</option>
                                            <option value="6">Zaterdag</option>
                                            <option value="7">Zondag</option>
                                        </select>

                                        <label for="start">Start:</label>
                                        <input class="form-control" type="time" name="start" id="start">

                                        <label for="end">End:</label>
                                        <input class="form-control" type="time" name="end" id="end">

                                        <label for="trainer">Trainer:</label>
                                        <input class="form-control" type="text" name="trainer" id="trainer">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-red">Training toevoegen</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ================================ --}}
            </div>
        </div>
        </div>
    @endsection
