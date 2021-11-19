<?php

namespace App\Providers;

use App\Models\RolenoteUserNote;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
         Gate::define('auteur_note', function($userConnected,$auteurNoteID){
           return $userConnected->id === $auteurNoteID ;
         });
         Gate::define('editeur_note', function($userConnected,$noteID){
           return count(RolenoteUserNote::where('user_id',$userConnected->id)->where('note_id',$noteID)->where('rolenote_id',2)->get())>0 || count(RolenoteUserNote::where('user_id',$userConnected->id)->where('note_id',$noteID)->where('rolenote_id',1)->get())>0  ;
         });
         Gate::define('auteur_note', function($userConnected,$noteID){
           return  count(RolenoteUserNote::where('user_id',$userConnected->id)->where('note_id',$noteID)->where('rolenote_id',1)->get())>0  ;
         });
         Gate::define('user_connected', function(){
           return Auth::check()  ;
         });


    }
}
