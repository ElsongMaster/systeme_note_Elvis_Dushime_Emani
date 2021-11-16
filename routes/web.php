<?php
use App\Http\Controllers\BackHomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NoteController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('notes', NoteController::class);
Route::get('/like/{noteId}', [NoteController::class,'likes'])->name('notes.like');
Route::get('/dislike/{noteId}', [NoteController::class,'dislikes'])->name('notes.dislike');
Route::get('/back',[BackHomeController::class,'index'])->name('back');
Route::get('/index',[IndexController::class, 'index'])->name('index');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
