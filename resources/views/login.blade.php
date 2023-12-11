<!doctype html>
<html lang="nl">

<body>
    @extends('layouts.app')
    @section('content')
        <div class="nav-background"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-uppercase fw-bold">ESBC Menhir beheerdersportaal</h1>
                    <br>
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <label for="email" class="form-label">Email adres</label>
                        <input type="email" name="email" class="form-control" id="email">

                        <label for="password" class="form-label">Wachtwoord</label>
                        <input type="password" name="password" class="form-control" id="password">
                        <br>
                        <button class="btn btn-red">Inloggen</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
