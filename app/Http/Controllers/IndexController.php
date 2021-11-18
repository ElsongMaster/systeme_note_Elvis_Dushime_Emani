<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        //  dd(!str_contains(request()->header('user-agent'),'Mobile'));   
        // $this->authorize('screen_mobile');
        $notes = Note::select("notes.*",DB::raw('count(note_userlikeds.id) as nbLike'))->join("note_userlikeds","note_userlikeds.note_id","=","notes.id","left outer")->groupBy("notes.id")->orderBy("nbLike","desc")->get();

        return view('front.pages.index',compact('notes'));
    }
}
