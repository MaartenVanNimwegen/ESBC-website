<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('nieuws', ['news' => $news]);
    }

    public function delete($id)
    {
        $news = News::find($id);
        if ($news) {
            $news->delete();
            return redirect()->back()->with('success', 'Het nieuwsartikel is succesvol verwijderd');
        }

        return redirect()->back()->with('error', 'Het nieuwsartikel is niet gevonden of kon niet worden verwijderd');
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->input(),
            [
                'title' => ['max:255', 'required', 'string'],
                'description' => ['required', 'max:5000', 'string'],
            ],
            [
                'title.max' => 'De titel is te lang!',
                'title.required' => 'De titel is verplicht!',
                'title.string' => 'De titel is van een ongeldig type!',
                'description.max' => 'De inhoud is te lang!',
                'description.required' => 'De inhoud is verplicht!',
                'description.string' => 'De inhoud is van een ongeldig type!',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $news = News::find($request->input('update-news'));
        if ($news) {

            $news->title = $request->input('title');
            $news->description = $request->input('description');
            $news->updated_at = now();
            $news->save();
            return redirect()->back()->with('success', 'Nieuws is met succes aangepast!');
        }
        return redirect()->back()->with('error', 'Nieuws niet gevonden of kon niet worden gewijzigd!');

    }

    public function add(Request $request)
    {
        $validator = Validator::make(
            $request->input(),
            [
                'title' => ['max:255', 'required', 'string'],
                'description' => ['required', 'max:5000', 'string'],
            ],
            [
                'title.max' => 'De titel is te lang!',
                'title.required' => 'De titel is verplicht!',
                'title.string' => 'De titel is van een ongeldig type!',
                'description.max' => 'De inhoud is te lang!',
                'description.required' => 'De inhoud is verplicht!',
                'description.string' => 'De inhoud is van een ongeldig type!',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $news = new News;
        $news->title = $request['title'];
        $news->description = $request['description'];
        $news->save();

        return redirect('/dashboard');
    }
}
