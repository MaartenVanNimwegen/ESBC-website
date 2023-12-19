<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('nieuws', ['news' => $news]);
    }

    public function delete()
    {

    }

    public function update()
    {

    }
}
