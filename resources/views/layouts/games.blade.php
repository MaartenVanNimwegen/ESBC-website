<div class="col-lg-6">
    <div class="game">
        <h1 class="text-uppercase fw-bold text-center">Uitslag laatste wedstrijd</h1>
        <div class="row g-0 game-top-bar">
            <h1 class="fw-bold">x12</h1>
        </div>
        <div class="game-picture-container">
            <div class="game-picture-bg">
                <div class="dark-overlay"></div>
                <img src="{{ asset('storage/images/games/game-bg-1.png') }}">
            </div>
            <div class="game-overlay">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="team">
                        <h3>ESBC Menhir</h3>
                        <img src="{{ asset('storage/images/logos/logoMenhir_Web.svg') }}" alt="ESBC Menhir logo">
                    </div>
                    <p class="text-uppercase fw-bold">vs</p>
                    <div class="team">
                        <h3>BV Groningen</h3>
                        <img src="{{ asset('storage/images/logos/image1.png') }}" alt="BVG logo">
                    </div>
                </div>
                <h2 class="text-uppercase fw-bold">18-21</h2>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="game">
        <h1 class="text-uppercase fw-bold text-center">Eerstvolgende wedstrijd</h1>
        <div class="row g-0 game-top-bar">
            <h1 class="fw-bold">MSE 1</h1>
        </div>
        <div class="game-picture-container">
            <div class="game-picture-bg">
                <div class="dark-overlay"></div>
                <img src="{{ asset('storage/images/games/game-bg-2.png') }}">
            </div>
            <div class="game-overlay">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="team">
                        <h3>{{ $firstGame->thuisPloeg }}</h3>
                        @php
                            $loc = App\Http\Controllers\HomeController::GetClubLogo($firstGame->thuisPloeg);
                        @endphp
                        <img src='{{ asset("$loc") }}'>
                    </div>
                    <p class="text-uppercase fw-bold">vs</p>
                    <div class="team">
                        <h3>{{ $firstGame->uitPloeg }}</h3>
                        @php
                            $loc = App\Http\Controllers\HomeController::GetClubLogo($firstGame->uitPloeg);
                        @endphp
                        <img src='{{ asset("$loc") }}'>
                    </div>
                </div>
                <h2 class="text-uppercase fw-bold">{{ date_format($firstGame->datum, 'd M') }}</h2>
            </div>
        </div>
    </div>
</div>
