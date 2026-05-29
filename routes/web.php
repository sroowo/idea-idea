<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\MusicController;
use Illuminate\Support\Facades\Route;
use App\Models\Idea;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\UserController;

Route::view('/', 'welcome', [
    'tasks' => [
        'Go do your homework',
        'Figure out life plans'
    ],
    'greeting' => 'Hello World!',
    'person' => request('person', 'John Doe')
]);
Route::view('/about','about');
Route::view('/contact','contact');


Route::middleware('auth')->group(function () {
    //index
    Route::get('/ideas', [IdeaController::class, 'index']);
    //create
    Route::get('/ideas/create', [IdeaController::class, 'create']);
    //show
    Route::get('/ideas/{idea}', [IdeaController::class, 'show']);
    //edit
    Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit']);
    //update
    Route::patch('/ideas/{idea}', [IdeaController::class, 'update']);
    //store
    Route::post('/ideas', [IdeaController::class, 'store']);
    //destroy
    Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy']);
});

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
});

//temporary
Route::get('/delete-ideas',function(){
    Idea::truncate();
});

Route::get('/register',[RegisteredUserController::class,'create']);
Route::post('/register',[RegisteredUserController::class,'store']);

Route::get('/users',[UserController::class,'index'])->name('users.index');
Route::get('/users/create',[UserController::class,'create'])->name('users.create');
Route::post('/users',[UserController::class,'store'])->name('users.store');
//show
Route::get('/users/{user}', [UserController::class, 'show']);
//edit
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
//update
Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/admin',function(){
    return 'Private Admin only area';
})->can('view-admin');


//music
Route::get('/music',[MusicController::class,'index'])->name('music.index');
Route::post('/music/{song}/like',[MusicController::class,'like']);

//movie
Route::get('/movie',[MovieController::class,'index'])->name('movie.index');
Route::get('/movie/import', [MovieController::class, 'import']); // to import movies from api key
Route::post('/movie/{movie}/like', [MovieController::class, 'like']);