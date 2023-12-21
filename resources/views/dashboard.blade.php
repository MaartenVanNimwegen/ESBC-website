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
                                    <td>{{ $sponsor->url }}</td>
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
                                                            je dit nieuwsartikel wilt verwijderen?
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
            </div>
        </div>
        </div>
    @endsection
