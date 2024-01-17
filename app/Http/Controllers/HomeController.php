<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Http;
use App\Models\Sponsor;
use DateTime;
use App\Models\Game;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->take(3)->get();
        $sponsors = Sponsor::get();
        $firstGame = $this->GetFirstGameOfMSE1();
        // dd($firstGame);
        return view('home', ['news' => $news, 'sponsors' => $sponsors, 'firstGame' => $firstGame]);
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

    public static function GetClubLogo($ploegName)
    {
        switch ($ploegName) {
            case stristr($ploegName, 'ESBC'):
                return "storage/images/logos/logoMenhir_Web.svg";
                break;

            default:
                return 'storage/images/logos/noimg.png';
                break;
        }
    }
}
