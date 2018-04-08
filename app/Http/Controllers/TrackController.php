<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackController extends Controller
{
    public function getUploadForm()
    {
        $genre = Genre::all();
        return view('upload')->with("genre", $genre);
    }

    public function uploadFile(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'album' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'price' => 'required|numeric|min:10000',
            'trackUpload' => 'required|mimetypes:audio/*',
        ]);
        $file = $request->file('trackUpload');
        $fileName = $request->input('name') . '-' . Track::count() . '.' . $file->getClientOriginalExtension();
        $file->move('Track', $fileName);
        Track::create([
            'name' => $request->input('name'),
            'album' => $request->input('album'),
            'artist' => $request->input('artist'),
            'date' => date('Y-m-d H:i:s'),
            'price' => $request->input('price'),
            'path' => 'Track/' . $fileName,
            'genre_id' => $request->input('genre'),
            'user_id' => Auth::user()->id,
        ]);
    }
}
