<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\NoteTag;
use App\Models\NoteUser;
use App\Models\NoteUserdisliked;
use App\Models\NoteUserliked;
use App\Models\RolenoteUserNote;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $notes =Note::select("notes.*",DB::raw('count(note_userlikeds.id) as nbLike'))->join("note_userlikeds","note_userlikeds.note_id","=","notes.id","left outer")->groupBy("notes.id")->orderBy("nbLike","desc")->get();

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

        $note->auteurId = Auth::user()->id;
        $note->titre = $rq->titre;
        $note->texte = $rq->texte;
        $note->shared = null;
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



        $tabChars = htmlentities($rq->texte);
        // dd($tabChars);
        $note->titre = $rq->titre;
        $note->texte = htmlspecialchars($rq->texte);
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
        $tabUserDisliked = [];
        $userId = Auth::user()->id;
        $noteUserDisliked = NoteUserdisliked::where('note_id','=',$noteId)->get();
        foreach( $noteUserDisliked as  $rowLine){
            array_push($tabUserDisliked,$rowLine->user_id);
        }

        if(!in_array($userId,$tabUserDisliked)){
            $noteUserDisliked = new NoteUserdisliked;
            $noteUserDisliked->note_id = $noteId;
            $noteUserDisliked->user_id = $userId;
            $noteUserDisliked->save();
        }
        
        return redirect()->back() ;

    }


    public function share(Request $rq,$noteId){

        $userCollection = User::where('email','=',$rq->email)->get();
        $msg = "Cette adresse n'appartient à aucun utilisateur";
        $tag = "error";
        if($userCollection->count() === 1){
            $user = $userCollection[0];
            //verif si l'user est déjà éditeur
            $userEditeurNoteCollection = RolenoteUserNote::where('note_id','=',$noteId)->where('rolenote_id','=',2)->where('user_id','=',2)->get();
            if($userEditeurNoteCollection->count() == 0){

                $tag = "success";
                $msg = "Note partagé correctement à l'utilisateur";
                $rolenoteusernote = new RolenoteUserNote;
                $rolenoteusernote->user_id = $user->id;
                $rolenoteusernote->note_id = $noteId;
                $rolenoteusernote->rolenote_id = 2;
                $rolenoteusernote->save();
                $noteShared = Note::find($noteId);
                $noteShared->shared = true;
                $noteShared->save();
            }else{

                $tag = "error";
                $msg = "Cette note à déjà été partagé à cette user";

            }

        }

        return redirect()->back()->with($tag,$msg);
    }

    public function filter(Request $rq){
        // dd($rq->nom);
          $notes =Note::select("notes.*",DB::raw('count(note_userlikeds.id) as nbLike'))->join("note_userlikeds","note_userlikeds.note_id","=","notes.id","left outer")->join("note_tags","note_tags.note_id","=","notes.id")->join("tags","tags.id","=","note_tags.tag_id")->where('tags.nom','=',$rq->nom)->groupBy("notes.id")->orderBy("nbLike","desc")->get();

        //   dd($notes);

        return view('front.pages.index',compact('notes'));
    }


}
