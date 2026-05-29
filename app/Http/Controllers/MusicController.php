<?php

namespace App\Http\Controllers;
use App\Models\Music;
use App\Models\Songs;

use Illuminate\Http\Request;

class MusicController extends Controller
{

    public function index()
    {
        $songs = Songs::with('album')->get();
        return view('music.index', [
            'songs' => $songs
        ]);
    }
    public function like(Request $request, Songs $song)
    {
        $user = $request->user();
        $user->songs()->attach($song->id);
        return redirect('/music');

    }

}
