<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rolenote extends Model
{
    use HasFactory;


    public function users(){
        return $this->belongsToMany(User::class,  'rolenote_user_notes','rolenote_id','user_id');
    }

    public function notes(){
        return $this->belongsToMany(Note::class,  'rolenote_user_notes','rolenote_id','role_id');
    }
}
