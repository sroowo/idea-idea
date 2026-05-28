<?php

namespace App\Http\Controllers;
use App\Models\Music;

use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $music = Music::all();
        return view('music.index',[
            'music'=> $music
        ]);

    }
    public function like(Request $request, Music $music)
    {
        $user=$request->user();
        $user->songs()->attach($music->id);
        return redirect('/music');
    }
    
}
