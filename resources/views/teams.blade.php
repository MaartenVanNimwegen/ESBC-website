@extends('layouts.app')
@section('content')
    <div class="nav-background"></div>
    <div class="container">
        <div class="row">
            <h1 class="text-uppercase fw-bold">Teams</h1>
            @foreach ($teams as $team)
                <div class="col-lg-6 col-sm-12 team">
                    <a href="{{ route('team-info', $team['plg_ID']) }}" class="team-link"
                        style="background-image: url('storage/{{ $team['teamFoto'] }}');">
                        <span class="team-name">{{ $team['name'] }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
