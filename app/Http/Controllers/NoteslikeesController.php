<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\NoteUserliked;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteslikeesController extends Controller
{
    public function index(){
        $notes = Note::all();
        $tabNbLikees = [];
        $noteslikees =Note::select("notes.*",DB::raw('count(note_userlikeds.id) as nbLike'))->join("note_userlikeds","note_userlikeds.note_id","=","notes.id")->groupBy("notes.id")->orderBy("nbLike","desc")->get();
        return view('front.pages.notes_likees', compact("noteslikees"));
    }
}
