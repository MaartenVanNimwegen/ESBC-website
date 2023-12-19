    @extends('layouts.adminApp')
    @section('content')
        <div id="dashboard">
            <div class="nav-background"></div>
            <div class="container">
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
                                    <td><i class="fa fa-pencil"></i></td>
                                    <td><i class="fa fa-trash"></i></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <i class="fa fa-plus"></i>
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
