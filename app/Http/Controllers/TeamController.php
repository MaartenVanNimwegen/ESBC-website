<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Game;
use App\Models\Team;
use DateTime;

use function Laravel\Prompts\error;

class TeamController extends Controller
{
    public function Index()
    {
        $teamOnder12 = new Team();
        $teamOnder12->name = 'Onder 12';
        $teamOnder12->plg_ID = 8996;
        $teamOnder12->picture_location = 'images/teams/Kind.png';

        $teamOnder14 = new Team();
        $teamOnder14->name = 'Onder 14';
        $teamOnder14->plg_ID = 13103;
        $teamOnder14->picture_location = 'images/teams/Groep_Jong.png';

        $teamOnder161 = new Team();
        $teamOnder161->name = 'Onder 16 1';
        $teamOnder161->plg_ID = 3772;
        $teamOnder161->picture_location = 'images/teams/Groep_Oud.png';

        $teamOnder162 = new Team();
        $teamOnder162->name = 'Onder 16 2';
        $teamOnder162->plg_ID = 3773;
        $teamOnder162->picture_location = 'images/teams/Groep_Oud.png';

        $teamOnder20 = new Team();
        $teamOnder20->name = 'Onder 20';
        $teamOnder20->plg_ID = 13103;
        $teamOnder20->picture_location = 'images/teams/Actie.png';

        $teamHeren1 = new Team();
        $teamHeren1->name = 'Heren 1';
        $teamHeren1->plg_ID = 3700;
        $teamHeren1->picture_location = 'images/teams/Shot.png';

        $teams = ['teams' => [$teamOnder12, $teamOnder14, $teamOnder161, $teamOnder162, $teamOnder20, $teamHeren1]];
        return view('teams', $teams);
    }

    public function Info(Request $request)
    {
        $upcommingGames = $this->GetUpcommingGames($request->plg_ID);
        $stand = $this->GetStand($request->plg_ID);


        if ($upcommingGames !== false) {
            return view('team-info', ['teamName' => $request->name, 'upcommingGames' => $upcommingGames, 'stand' => $stand]);
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
