<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Sponsor;
use App\Models\Team;

class DashboardController extends Controller
{
    public function ViewDashboard()
    {
        $news = News::all();
        $sponsors = Sponsor::all();
        $teams = Team::all();
        return view('dashboard', ['news' => $news, 'sponsors' => $sponsors, 'teams' => $teams]);
    }
}
