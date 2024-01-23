<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Sponsor;
use App\Models\Team;
use App\Models\Training;

class DashboardController extends Controller
{
    public function ViewDashboard()
    {
        $news = News::all();
        $sponsors = Sponsor::all();
        $teams = Team::all();
        $trainingen = Training::all();
        return view('dashboard', ['news' => $news, 'sponsors' => $sponsors, 'teams' => $teams, 'trainingen' => $trainingen]);
    }
}
