<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Game;
use DateTime;

use function Laravel\Prompts\error;

class TeamController extends Controller
{
    public function Index()
    {
        $teamOnder12 = ['plg_ID' => 8996, 'name' => 'Onder 12', 'teamFoto' => 'images/teams/Kind.png'];
        $teamOnder14 = ['plg_ID' => 13103, 'name' => 'Onder 14', 'teamFoto' => 'images/teams/Groep_Jong.png'];
        $teamOnder161 = ['plg_ID' => 3772, 'name' => 'Onder 16 1', 'teamFoto' => 'images/teams/Groep_Oud.png'];
        $teamOnder162 = ['plg_ID' => 3773, 'name' => 'Onder 16 2', 'teamFoto' => 'images/teams/Groep_Oud.png'];
        $teamOnder20 = ['plg_ID' => 10264, 'name' => 'Onder 20', 'teamFoto' => 'images/teams/Actie.png'];
        $teamHeren1 = ['plg_ID' => 3700, 'name' => 'Heren 1', 'teamFoto' => 'images/teams/Shot.png'];
        return view('teams', ['teams' => [$teamOnder12, $teamOnder14, $teamOnder161, $teamOnder162, $teamOnder20, $teamHeren1]]);
    }

    public function Info($plg_ID)
    {
        $upcommingGames = $this->GetUpcommingGames($plg_ID);
        $stand = $this->GetStand($plg_ID);

        if ($upcommingGames !== false && $stand !== false) {
            return view('team-info', ['teamNaam' => '', 'upcommingGames' => $upcommingGames, 'stand' => $stand]);
        }
    }

    private function GetUpcommingGames($plg_ID)
    {
        $response = Http::get("http://db.basketball.nl/db/json/wedstrijd.pl?plg_ID=$plg_ID");
        if ($response->successful()) {
            $data = json_decode($response->body(), true);
            $upcommingGames = [];
            $currentDate = new DateTime();
            foreach ($data['wedstrijden'] as $game) {
                $playDate = new DateTime($game['datum']);
                if ($playDate >= $currentDate) {
                    $gameModel = new Game();
                    $gameModel->datum = date_format($playDate, 'd-m-Y');
                    $gameModel->tijd = date_format($playDate, 'H:i');
                    $gameModel->thuisPloeg = $game['thuis_ploeg'];
                    $gameModel->uitPloeg = $game['uit_ploeg'];
                    $gameModel->sporthal = $game['loc_naam'];
                    $upcommingGames[] = $gameModel;
                }
            }
            return $upcommingGames;
        } else {
            return false;
        }
    }

    private function GetStand($plg_ID)
    {
        $response = Http::get("http://db.basketball.nl/db/json/wedstrijd.pl?plg_ID=$plg_ID");
        if ($response->successful()) {
            $data = json_decode($response->body(), true);
            $upcommingGames = [];
            $currentDate = new DateTime();
            foreach ($data['wedstrijden'] as $game) {
                $playDate = new DateTime($game['datum']);
                if ($playDate >= $currentDate) {
                    $gameModel = new Game();
                    $gameModel->datum = date_format($playDate, 'd-m-Y');
                    $gameModel->tijd = date_format($playDate, 'H:i');
                    $gameModel->thuisPloeg = $game['thuis_ploeg'];
                    $gameModel->uitPloeg = $game['uit_ploeg'];
                    $gameModel->sporthal = $game['loc_naam'];
                    $upcommingGames[] = $gameModel;
                }
            }
            return $upcommingGames;
        } else {
            return false;
        }
    }
}
