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
use Illuminate\Support\Facades\Storage;


use function Laravel\Prompts\error;

class TeamController extends Controller
{
    public function ViewTeam()
    {
        $teams = Team::all();
        return view('teams', ['teams' => $teams]);
    }

    public function ViewTeamInfo(Request $request)
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

    public function delete($id)
    {
        $team = Team::find($id);
        if ($team) {
            Storage::disk('public')->delete($team->picture_location);
            $team->delete();
            return redirect()->back()->with('success', 'Het team is succesvol verwijderd');
        }

        return redirect()->back()->with('error', 'Het team is niet gevonden of kon niet worden verwijderd');
    }

    public function update($id)
    {
        $validated = request()->validate(
            [
                'name' => 'required|string|min:3|max:255',
                'plg_ID' => 'required|regex:^\s*-*[0-9]{1,10}\s*$^|max:100',
                'cmp_ID' => 'required|regex:^\s*-*[0-9]{1,10}\s*$^|max:100',
                'picture' => 'image|required',
            ],
            [
                'name.required' => 'De naam van het team is verplicht!',
                'name.string' => 'De naam van het team is van een verkeerd type!',
                'name.min' => 'De naam van het team is te kort!',
                'name.max' => 'De naam van het team is te lang!',
                'plg_ID.required' => 'Een ploeg ID is verplicht!',
                'plg_ID.integer' => 'Een ploeg ID moet een getal zijn!',
                'plg_ID.max' => 'Het ploeg ID mag maximaal 10 cijfers zijn!',
                'cmp_ID.required' => 'Een competitie ID is verplicht!',
                'cmp_ID.integer' => 'Een competitie ID moet een getal zijn!',
                'cmp_ID.max' => 'Het competitie ID mag maximaal 10 cijfers zijn!',
                'picture.image' => 'Het logo van het team moet van het type: jpeg, jpg, png of gif zijn!',
                'picture.required' => 'Het logo van het team is verplicht!',
            ]
        );

        $team = Team::find($id);
        if ($team) {
            if (request()->has('picture')) {
                $picturePath = request()->file('picture')->store('images/sponsors', 'public');
                $validated['picture'] = $picturePath;
                $team->name = $validated['name'];
                $team->plg_ID = $validated['plg_ID'];
                $team->cmp_ID = $validated['cmp_ID'];
                $team->picture_location = $validated['picture'];
                $team->save();
                return redirect()->back()->with('success', 'Het team is succesvol gewijzigd!');
            }
        }
        return redirect()->back()->with('error', 'Het team is niet gevonden of kon niet worden gewijzigd!');
    }

    public function add()
    {
        $validated = request()->validate(
            [
                'name' => 'required|string|min:3|max:255',
                'plg_ID' => 'required|regex:^\s*-*[0-9]{1,10}\s*$^|max:100',
                'cmp_ID' => 'required|regex:^\s*-*[0-9]{1,10}\s*$^|max:100',
                'picture' => 'image|required',
            ],
            [
                'name.required' => 'De naam van het team is verplicht!',
                'name.string' => 'De naam van het team is van een verkeerd type!',
                'name.min' => 'De naam van het team is te kort!',
                'name.max' => 'De naam van het team is te lang!',
                'plg_ID.required' => 'Een ploeg ID is verplicht!',
                'plg_ID.integer' => 'Een ploeg ID moet een getal zijn!',
                'plg_ID.max' => 'Het ploeg ID mag maximaal 10 cijfers zijn!',
                'cmp_ID.required' => 'Een competitie ID is verplicht!',
                'cmp_ID.integer' => 'Een competitie ID moet een getal zijn!',
                'cmp_ID.max' => 'Het competitie ID mag maximaal 10 cijfers zijn!',
                'picture.image' => 'Het logo van het team moet van het type: jpeg, jpg, png of gif zijn!',
                'picture.required' => 'Het logo van het team is verplicht!',
            ]
        );


        if (request()->has('picture')) {
            $picturePath = request()->file('picture')->store('images/sponsors', 'public');
            $validated['picture'] = $picturePath;
        }

        $team = new Team();
        $team->name = $validated['name'];
        $team->plg_ID = $validated['plg_ID'];
        $team->cmp_ID = $validated['cmp_ID'];
        $team->picture_location = $validated['picture'];
        $team->save();

        return redirect()->back()->with('success', 'Het team is succesvol toegevoegd!');
    }
}
