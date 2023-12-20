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
                    {{-- ================================ --}}
                    <button type="button" class="btn btn-red" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-plus"></i>
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nieuws toevoegen</h1>
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

                <h1 class="mt-5">Sponsors:</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Logo</th>
                                <th>Link</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sponsors as $sponsor)
                                <tr>
                                    <td>{{ $sponsor->title }}</td>
                                    <td><img class="sponsor-image" src="{{ asset($sponsor->picture_location) }}"
                                            alt="">
                                    </td>
                                    <td>{{ $sponsor->link }}</td>
                                    <td><i class="fa fa-pencil"></i></td>
                                    <td><i class="fa fa-trash"></i></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <i class="fa fa-plus"></i>
                </div>
            </div>
        </div>
        </div>
    @endsection
