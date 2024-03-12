<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Game;
use DateTime;

class GameController extends Controller
{
    public function ViewGame()
    {
        $response = Http::get('http://db.basketball.nl/db/json/wedstrijd.pl?clb_ID=341&dagen_terug=1');
        if ($response->successful()) {
            $data = json_decode($response->body(), true);
            $games = [];
            foreach ($data['wedstrijden'] as $game) {
                $playDate = new DateTime($game['datum']);
                $gameModel = new Game();
                $gameModel->datum = date_format($playDate, 'd-m-Y');
                $gameModel->tijd = date_format($playDate, 'H:i');
                $gameModel->thuisPloeg = $game['thuis_ploeg'];
                $gameModel->uitPloeg = $game['uit_ploeg'];
                $games[] = $gameModel;
            }
            return view('wedstrijden', ['upcommingGames' => $games]);
        } else {
            return view('wedstrijden', ['upcommingGames' => 'error']);
        }
    }
}