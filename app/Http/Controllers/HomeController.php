<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class HomeController extends Controller {
    public function index() {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('home', ['news' => $news]);
    }

}
