<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\NoteTag;
use App\Models\NoteUser;
use App\Models\NoteUserliked;
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
        $notes = Note::all();
        return view('back.note.allnote',compact('notes'));
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
        $tags = Tag::all();
        $tagIds = [];
        foreach($note->tags as $tag){
            array_push($tagIds,$tag->id);
        }
        return view('back.note.edit',compact('note','tagIds','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $rq, Note $note)
    {
        
        $rq->validate([
            "titre"=>["required"],
            "texte"=>["required"],
            "tags"=>["required"]
        ]);




        $note->titre = $rq->titre;
        $note->texte = $rq->texte;
        $note->save();



        $note_tags = NoteTag::where('note_id','=',$note->id)->get();
        foreach($note_tags as $rowData){
            $rowData->delete();
        }

        foreach($rq->tags as $tagId){
            $note_tag = new NoteTag; 
            $note_tag->note_id = $note->id;
            $note_tag->tag_id = intval($tagId);
            $note_tag->save();
 
        }

        return redirect()->route('notes.index')->with('success','data de la note correctement update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $notesToDelete = RolenoteUserNote::where('note_id','=',$note->id)->get();
        foreach($notesToDelete as $rowData){
            $rowData->delete();
        }
        $note->delete();

        return redirect()->back()->with('success','notes correctement supprimer');
    }



    public function likes($noteId){
        $tabUserLiked = [];
        $userId = Auth::user()->id;
        $noteUserLiked = NoteUserliked::where('note_id','=',$noteId)->get();
        foreach( $noteUserLiked as  $rowLine){
            array_push($tabUserLiked,$rowLine->user_id);
        }
        // dd(!in_array($userId,$tabUserLiked));

        if(!in_array($userId,$tabUserLiked)){
            $noteUserLiked = new NoteUserliked;
            $noteUserLiked->note_id = $noteId;
            $noteUserLiked->user_id = $userId;
            $noteUserLiked->save();
        }
        
        return redirect()->back() ;

    }

    public function dislikes($noteId){
        $userId = Auth::user()->id;
        $rowLine =  NoteUserliked::where('note_id','=',$noteId)->where('user_id','=',$userId);
        $rowLine->delete();
        return redirect()->back() ;
    }
}
