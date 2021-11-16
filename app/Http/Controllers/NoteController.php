<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\NoteTag;
use App\Models\NoteUser;
use App\Models\RolenoteUserNote;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
       return view('back.note.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
        
        $rq->validate([
            "titre"=>["required"],
            "texte"=>["required"],
            "tags"=>["required"]
        ]);

        $note = new Note;
        $rolenote_use_note= new RolenoteUserNote;

        $note->titre = $rq->titre;
        $note->texte = $rq->texte;
        $note->save();
        $rolenote_use_note->user_id = Auth::user()->id;
        $rolenote_use_note->note_id = $note->id;
        $rolenote_use_note->rolenote_id = 1;
        $rolenote_use_note->save();

        foreach($rq->tags as $tagId){
            $note_tag = new NoteTag;
            $note_tag->note_id = $note->id;
            $note_tag->tag_id = intval($tagId);
             $note_tag->save();
 
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
