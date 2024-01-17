<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Game;
use App\Models\Stand;
use App\Models\Uitslag;
use App\Models\Team;
use DateTime;

use function Laravel\Prompts\error;

class TeamController extends Controller
{
    public function Index()
    {
        $teams = Team::all();
        return view('teams', ['teams' => $teams]);
    }

    public function Info(Request $request)
    {
        $team = Team::find($request->id);
        $upcommingGames = $this->GetUpcommingGames($team->plg_ID);
        $standen = $this->GetStand($team->cmp_ID);
        $uitslagen = $this->GetUitslag($team->plg_ID);


        if ($upcommingGames !== false) {
            return view('team-info', ['teamName' => $request->name, 'upcommingGames' => $upcommingGames, 'standen' => $standen, 'uitslagen' => $uitslagen]);
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
            return 'error';
        }
    }

    private function GetStand($cmp_ID)
    {
        $response = Http::get("https://db.basketball.nl/db/json/stand.pl?cmp_ID=$cmp_ID");
        if ($response->successful()) {
            $data = json_decode($response->body(), true);
            $standen = [];
            foreach ($data['stand'] as $stand) {
                $standModel = new Stand();
                $standModel->rang = $stand['rang'];
                $standModel->afko = $stand['afko'];
                $standModel->gespeeld = $stand['gespeeld'];
                $standModel->punten = $stand['punten'];
                $standModel->eigenScore = $stand['eigenscore'];
                $standModel->tegenScore = $stand['tegenscore'];
                $standModel->saldo = $stand['saldo'];
                $standen[] = $standModel;
            }
            return $standen;
        } else {
            return 'error';
        }
    }

    private function GetUitslag($plg_ID)
    {
        try {
            $response = Http::get("http://db.basketball.nl/db/json/wedstrijd.pl?plg_ID=$plg_ID");
            if ($response->successful()) {
                $data = json_decode($response->body(), true);
                $uitslagen = [];
                foreach ($data['wedstrijden'] as $uitslag) {
                    if ($uitslag['score_uit'] !== 0 && $uitslag['score_thuis'] !== 0) {

                        $uitslagModel = new Uitslag();
                        $uitslagModel->Thuisteam = $uitslag['thuis_ploeg'];
                        $uitslagModel->Uitteam = $uitslag['uit_ploeg'];
                        $uitslagModel->ScoreThuis = $uitslag['score_thuis'];
                        $uitslagModel->ScoreUit = $uitslag['score_uit'];
                        $uitslagen[] = $uitslagModel;
                    }
                }
                return $uitslagen;
            } else {
                return 'error';
            }
        } catch (Exception $exception) {
            return 'error';
        }
    }

    private function GetStand1($cmp_ID)
    {
        $response = Http::get("https://db.basketball.nl/db/json/stand.pl?cmp_ID=$cmp_ID");
        if ($response->successful()) {
            $data = json_decode($response->body(), true);
            $standen = [];
            foreach ($data['stand'] as $stand) {
                $standModel = new Stand();
                $standModel->rang = $stand['rang'];
                $standModel->afko = $stand['afko'];
                $standModel->gespeeld = $stand['gespeeld'];
                $standModel->punten = $stand['punten'];
                $standModel->eigenScore = $stand['eigenscore'];
                $standModel->tegenScore = $stand['tegenscore'];
                $standModel->saldo = $stand['saldo'];
                $standen[] = $standModel;
            }
            return $standen;
        } else {
            return false;
        }
    }

    private function GetStand2($cmp_ID)
    {
        $response = Http::get("https://db.basketball.nl/db/json/stand.pl?cmp_ID=$cmp_ID");
        if ($response->successful()) {
            $data = json_decode($response->body(), true);
            $standen = [];
            foreach ($data['stand'] as $stand) {
                $standModel = new Stand();
                $standModel->rang = $stand['rang'];
                $standModel->afko = $stand['afko'];
                $standModel->gespeeld = $stand['gespeeld'];
                $standModel->punten = $stand['punten'];
                $standModel->eigenScore = $stand['eigenscore'];
                $standModel->tegenScore = $stand['tegenscore'];
                $standModel->saldo = $stand['saldo'];
                $standen[] = $standModel;
            }
            return $standen;
        } else {
            return false;
        }
    }
}
