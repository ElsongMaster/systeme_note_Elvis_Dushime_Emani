<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'image',
        'name',
        'email',
        'role_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function notelikeds(){
        return $this->belongsToMany(Note::class,'note_userlikeds','user_id','note_id');
    }
    public function notedislikeds(){
        return $this->belongsToMany(Note::class,'note_userdislikeds','user_id','note_id');
    }


    //Relation rolenote - user - note
    public function rolenotes(){
        return $this->belongsToMany(Rolenote::class, 'rolenote_user_notes','user_id','rolenote_id');
    }
    public function notes(){
        return $this->belongsToMany(Note::class, 'rolenote_user_notes','user_id','note_id');
    }














}
