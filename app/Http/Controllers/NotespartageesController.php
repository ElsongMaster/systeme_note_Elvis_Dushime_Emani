<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotespartageesController extends Controller
{
    public function index(){
        $notespartagees =  Note::where('shared','=',true)->get();
        return view('front.pages.notes_partagees',compact('notespartagees'));
    }
}
