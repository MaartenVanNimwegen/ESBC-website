<div class="col-lg-6">
    <div class="game">
        <h1 class="text-uppercase fw-bold text-center">Uitslag laatste wedstrijd</h1>
        <div class="row g-0 game-top-bar">
            <h1 class="fw-bold">MSE 1</h1>
        </div>
        <div class="game-picture-container">
            <div class="game-picture-bg">
                <div class="dark-overlay"></div>
                <img src="{{ asset('storage/images/games/game-bg-1.webp') }}" alt="game-background">
            </div>
            <div class="game-overlay">
                @if ($lastGame !== 'error')
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="team">
                            <h3>{{ $lastGame->Thuisteam }}</h3>
                            @php
                                $loc = App\Http\Controllers\HomeController::GetClubLogo($lastGame->Thuisteam);
                            @endphp
                            <img src='{{ asset("$loc") }}' alt="team-logo">
                        </div>
                        <p class="text-uppercase fw-bold">vs</p>
                        <div class="team">
                            <h3>{{ $lastGame->Uitteam }}</h3>
                            @php
                                $loc = App\Http\Controllers\HomeController::GetClubLogo($lastGame->Uitteam);
                            @endphp
                            <img src='{{ asset("$loc") }}' alt="team-logo">
                        </div>
                    </div>
                    <h2 class="text-uppercase fw-bold">{{ $lastGame->ScoreThuis }} - {{ $lastGame->ScoreUit }}</h2>
                @else
                    <div>
                        <p>Er is iets fout gegaan bij het ophalen van de laatste wedstrijd bij de externe bron. Excuses
                            voor het ongemak.</p>
                    </div>
                @endif
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
                <img src="{{ asset('storage/images/games/game-bg-2.webp') }}" alt="game-background">
            </div>
            <div class="game-overlay">
                @if ($firstGame !== 'error')
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="team">
                            <h3>{{ $firstGame->thuisPloeg }}</h3>
                            @php
                                $loc = App\Http\Controllers\HomeController::GetClubLogo($firstGame->thuisPloeg);
                            @endphp
                            <img src='{{ asset("$loc") }}' alt="team-logo">
                        </div>
                        <p class="text-uppercase fw-bold">vs</p>
                        <div class="team">
                            <h3>{{ $firstGame->uitPloeg }}</h3>
                            @php
                                $loc = App\Http\Controllers\HomeController::GetClubLogo($firstGame->uitPloeg);
                            @endphp
                            <img src='{{ asset("$loc") }}' alt="team-logo">
                        </div>
                    </div>
                    <h2 class="text-uppercase fw-bold">{{ date_format($firstGame->datum, 'd M') }}</h2>
                @else
                <div>
                    <p>Er is iets fout gegaan bij het ophalen van de volgende wedstrijd bij de externe bron. Excuses voor het ongemak.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
