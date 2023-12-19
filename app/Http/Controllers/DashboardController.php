<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Sponsor;

class DashboardController extends Controller
{
    public function index()
    {
        $news = News::all();
        $sponsors = Sponsor::all();
        return view('dashboard', ['news' => $news, 'sponsors' => $sponsors]);
    }
}
