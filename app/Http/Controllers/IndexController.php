<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $notes = Note::all();
        return view('front.pages.index',compact('notes'));
    }
}
