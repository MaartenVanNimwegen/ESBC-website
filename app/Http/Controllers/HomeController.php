<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Sponsor;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->take(3)->get();
        $sponsors = Sponsor::get();
        return view('home', ['news' => $news, 'sponsors' => $sponsors]);
    }

}
