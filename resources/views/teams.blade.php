@extends('layouts.app')
@section('content')
    <div class="nav-background"></div>
    <div class="container">
        <div class="row">
            <h1 class="text-uppercase fw-bold">Teams</h1>
            @foreach ($teams as $team)
                <div class="col-lg-6 col-sm-12 team">
                    <form action="{{ route('team-info') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="{{ $team->name }}">
                        <input type="hidden" name="plg_ID" value="{{ $team->plg_ID }}">
                        <input type="hidden" name="picture_location" value="{{ $team->picture_location }}">
                        <button style="background-image: url('storage/{{ $team->picture_location }}');" type="submit"
                            class="team-link"><span class="team-name">{{ $team->name }}</span></button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
