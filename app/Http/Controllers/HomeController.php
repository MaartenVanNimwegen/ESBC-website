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
    public function ViewHome()
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
            return last($uitslagen);
        } else {
            return 'error';
        }
    }

    public static function GetClubLogo($ploegName)
    {
        switch ($ploegName) {
            case(stripos($ploegName, 'esbc menhir') !== false):
                return "storage/images/logos/menhir_logo.svg";
                break;

            case(stripos($ploegName, 'groningen') !== false):
                return "storage/images/logos/groningen_logo.png";
                break;

            case(stripos($ploegName, 'hornets') !== false):
                return "storage/images/logos/hornets_logo.png";
                break;

            case(stripos($ploegName, 'arrows') !== false):
                return "storage/images/logos/arrows_logo.png";
                break;

            case(stripos($ploegName, 'ceres') !== false):
                return "storage/images/logos/ceres_logo.png";
                break;

            case(stripos($ploegName, 'assist') !== false):
                return "storage/images/logos/assist_logo.svg";
                break;

            case(stripos($ploegName, 'leeuwarden') !== false):
                return "storage/images/logos/leeuwarden_logo.svg";
                break;

            case(stripos($ploegName, 'H.S.V.') !== false):
                return "storage/images/logos/hsv_logo.svg";
                break;

            case(stripos($ploegName, 'moestasj') !== false):
                return "storage/images/logos/moestasj_logo.svg";
                break;

            case(stripos($ploegName, 'celeritas') !== false):
                return "storage/images/logos/celeritas_logo.png";
                break;

            case(stripos($ploegName, 'rhino') !== false):
                return "storage/images/logos/rhino_logo.png";
                break;

            case(stripos($ploegName, 'falcons') !== false):
                return "storage/images/logos/falcons_logo.svg";
                break;

            case(stripos($ploegName, 'penta') !== false):
                return "storage/images/logos/penta_logo.png";
                break;

            case(stripos($ploegName, 'oaters') !== false):
                return "storage/images/logos/oaters_logo.png";
                break;

            case(stripos($ploegName, 'mustangs') !== false):
                return "storage/images/logos/mustangs_logo.svg";
                break;

            case(stripos($ploegName, 'trojans') !== false):
                return "storage/images/logos/trojans_logo.png";
                break;

            case(stripos($ploegName, 'lions') !== false):
                return "storage/images/logos/lions_logo.png";
                break;

            case(stripos($ploegName, 'bedum') !== false):
                return "storage/images/logos/bedum_logo.png";
                break;

            case(stripos($ploegName, 'dyna') !== false):
                return "storage/images/logos/dyna_logo.svg";
                break;

            case(stripos($ploegName, 'scylla') !== false):
                return "storage/images/logos/scylla_logo.png";
                break;

            case(stripos($ploegName, 'uilen') !== false):
                return "storage/images/logos/uilen_logo.png";
                break;

            case(stripos($ploegName, 'M.A.C.') !== false):
                return "storage/images/logos/mac_logo.svg";
                break;

            case(stripos($ploegName, 'quintas') !== false):
                return "storage/images/logos/quintas.png";
                break;

            case(stripos($ploegName, 'five') !== false):
                return "storage/images/logos/five_logo.png";
                break;

            default:
                return 'storage/images/logos/noimg.svg';
                break;
        }
    }
}
