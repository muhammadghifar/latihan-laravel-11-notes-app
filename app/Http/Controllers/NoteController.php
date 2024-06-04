<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // $notes = Note::where('user_id', $userId)->latest('updated_at')->paginate(5);
        $notes = Note::whereBelongsTo($user)->latest('updated_at')->paginate(5);
        
        return view('notes.index')->with('notes', $notes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();

        $request->validate([
            'title' => 'required|max:64',
            'description' => 'required'
        ]);

        // Note::create([
        //     'user_id' => $userId,
        //     'title' => $request->title,
        //     'description' => $request->description
        // ]);

        Auth::user()->notes()->create([
            'title' => $request->title,
            'description' => $request->description
        ]);
        
        return to_route('notes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userId = Auth::id();

        $note = Note::where('id', $id)->where('user_id', $userId)->firstOrFail();

        return view('notes.show')->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $user = Auth::user();

        if(!$note->user->is($user)) {
            return abort(403);
        }

        return view('notes.edit')->with('note', $note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $user = Auth::user();

        if(!$note->user->is($user)) {
            return abort(403);
        }

        $request->validate([
            'title' => 'required|max:64',
            'description' => 'required'
        ]);

        $note->update([
            'title' => $request->title,
            'description' => $request->description
        ]);
        
        return to_route('notes.show', $note)->with('success', 'Success to edit Note');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $user = Auth::user();

        if(!$note->user->is($user)) {
            return abort(403);
        }

        $note->delete();

        return to_route('notes.index')->with('success', 'Success to delete Note');
    }
}
