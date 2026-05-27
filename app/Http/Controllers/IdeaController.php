<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Gate;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIdeaRequest;
use Illuminate\Support\Facades\Auth;
use App\Notifications\IdeaPublished;


class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ideas = Idea::query()->where([
            'user_id' => Auth::id(),
        ])->get();
        return view('ideas.index', [
            'ideas' => $ideas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIdeaRequest $request)
    {
        $idea=Auth::user()->ideas()->create([
            'description' => request('desc'),
            'category' => request('inc'),
            'state' => 'pending',
        ]);
        Auth::user()->notify(new IdeaPublished ($idea));
        return redirect('/ideas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        Gate::authorize('update', $idea);
        return view('ideas.show', [
            'idea' => $idea,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        Gate::authorize('update', $idea);
        return view('ideas.edit', [
            'idea' => $idea,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea)
    {
        Gate::authorize('update', $idea);
        $idea->update([
            'description' => request('description'),
        ]);
        return redirect('/ideas/' . $idea->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        Gate::authorize('update', $idea);
        $idea->delete();
        return(redirect('/ideas'));
    }
}
