<?php
use App\Http\Controllers\BackHomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\NoteslikeesController;
use App\Http\Controllers\NotespartageesController;
use App\Http\Controllers\NotespersosController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::resource('notes', NoteController::class)->middleware(['auth']);
Route::resource('users', UserController::class)->middleware(['auth']);
Route::get('/like/{noteId}', [NoteController::class,'likes'])->middleware(['auth'])->name('notes.like');
Route::get('/dislike/{noteId}', [NoteController::class,'dislikes'])->middleware(['auth',''])->name('notes.dislike');
Route::post('/share/{noteId}', [NoteController::class,'share'])->middleware(['auth'])->name('notes.share');
Route::post('/filter', [NoteController::class,'filter'])->middleware(['auth'])->name('notes.filter');
Route::get('/back',[BackHomeController::class,'index'])->middleware(['auth'])->name('back');
Route::get('/notesLikees',[NoteslikeesController::class,'index'])->middleware(['auth','screen_mobile'])->name('noteslikees');
Route::get('/notesPartagees',[NotespartageesController::class,'index'])->middleware(['auth'])->name('notespartagees');
Route::get('/notesPersos',[NotespersosController::class,'index'])->middleware(['auth'])->name('notespersos');
Route::get('/',[IndexController::class, 'index'])->middleware(['screen_mobile'])->name('index');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::put('/update-laravel-window-size', \Tanthammar\LaravelWindowSize\LaravelWindowSizeController::class)
    ->middleware('web', 'throttle:15,1');


require __DIR__.'/auth.php';
