<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Http;
use App\Models\Sponsor;
use DateTime;
use App\Models\Game;
use App\Models\Uitslag;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->take(3)->get();
        $sponsors = Sponsor::get();
        $firstGame = $this->GetFirstGameOfMSE1();
        $lastGame = $this->GetLastGameOfMSE1();
        return view('home', ['news' => $news, 'sponsors' => $sponsors, 'firstGame' => $firstGame, 'lastGame' => $lastGame]);
    }

    public function GetFirstGameOfMSE1()
    {
        $plg_ID = 3700;
        $response = Http::get("http://db.basketball.nl/db/json/wedstrijd.pl?plg_ID=$plg_ID");
        if ($response->successful()) {
            $data = json_decode($response->body(), true);
            $upcommingGames = [];
            $currentDate = new DateTime();
            foreach ($data['wedstrijden'] as $game) {
                $playDate = new DateTime($game['datum']);
                if ($playDate >= $currentDate) {
                    $gameModel = new Game();
                    $gameModel->datum = new DateTime($game['datum']);
                    $gameModel->tijd = date_format($playDate, 'H:i');
                    $gameModel->thuisPloeg = $game['thuis_ploeg'];
                    $gameModel->uitPloeg = $game['uit_ploeg'];
                    $gameModel->sporthal = $game['loc_naam'];
                    $upcommingGames[] = $gameModel;
                }
            }
            return $upcommingGames[0];
        } else {
            return 'error';
        }
    }

    public function GetLastGameOfMSE1()
    {
        $plg_ID = 3700;
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
            return $uitslagen[0];
        } else {
            return 'error';
        }
    }

    public static function GetClubLogo($ploegName)
    {
        switch ($ploegName) {
            case (stripos($ploegName, 'esbc menhir') !== false):
                return "storage/images/logos/logoMenhir_Web.svg";
                break;

            case (stripos($ploegName, 'groningen') !== false):
                return "storage/images/logos/bvgGroningen.png";
                break;

            default:
                return 'storage/images/logos/noimg.png';
                break;
        }
    }
}
