<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('back.user.allUser', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            "image"=>["required"],
            "name"=>["required"],
            "email"=>["required"],
            "role_id"=>["required"],
            "password"=>["required"],
        ]);

        $user = new User;
        $user->image = $rq->file('image')->hashName();
        $rq->file('image')->storePublicly('img/', 'public');
        $user->name = $rq->name;
        $user->email = $rq->email;
        $user->role_id = $rq->role_id;
        $user->password = Hash::make($rq->password);
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('back.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('back.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $rq, User $user)
    {
        $rq->validate([
            "image"=>["required"],
            "name"=>["required"],
            "email"=>["required"],
            "role_id"=>["required"],
            "password"=>["required"],
        ]);

        if($rq->file('image') !== null){
            
            Storage::disk('public')->delete('img/class/'.$user->image);
            $user->image = $rq->file('image')->hashName();
            $rq->file('image')->storePublicly('img/class/', 'public');
        }
        $user->name = $rq->name;
        $user->email = $rq->email;
        $user->role_id = $rq->role_id;
        $user->password = Hash::make($rq->password);
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success','Utilisateur correctement supprimer');
    }
}
