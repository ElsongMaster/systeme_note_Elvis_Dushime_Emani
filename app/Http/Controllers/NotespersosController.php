<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotespersosController extends Controller
{
    public function index(){
        $notes = Note::all();
        return view('front.pages.note_persos',compact('notes'));        
    }
}
