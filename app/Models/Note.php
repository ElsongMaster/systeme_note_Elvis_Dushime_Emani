<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;


    public function tags(){
        return $this->belongsToMany(Tag::class,'note_tags','note_id','tag_id');
    }


    public function userslikeds(){
        return $this->belongsToMany(User::class,'note_userlikeds','note_id','user_id');

    }

    public function users(){
        return $this->belongsToMany(User::class, 'rolenote_user_notes','note_id','user_id');
    }

    public function rolenotes(){
        return $this->belongsToMany(Rolenote::class, 'rolenote_user_notes','note_id','rolenote_id');
    }


}
