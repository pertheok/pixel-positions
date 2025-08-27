<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Livewire\ArticleIndex;
use App\Livewire\ArticleList;
use App\Livewire\CreateArticle;
use App\Livewire\Dashboard;
use App\Livewire\EditArticle;
use App\Livewire\ShowArticle;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [JobController::class, 'index']);

Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::prefix('/lw')->group(function () {
    Route::get('/', ArticleIndex::class);
    Route::get('/articles/{article}', ShowArticle::class)->name('lw.articles.show');
    Route::get('/dashboard', Dashboard::class);
    Route::get('/dashboard/articles', ArticleList::class);
    Route::get('/dashboard/articles/create', CreateArticle::class);
    Route::get('/dashboard/articles/{article}/edit', EditArticle::class);
});
