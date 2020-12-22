<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\BookmarkController;

Route::get('/', [WelcomeController::class, 'index'])
						->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () 
{

	Route::get('/dashboard', [DashboardController::class, 'index'])
								->name('dashboard');

	//Bookmark
	Route::get('/bookmarks', [BookmarkController::class, 'index'])
								->name('bookmarks');
	Route::get('/bookmarks/add', [BookmarkController::class, 'add'])
								->name('bookmarks.add');	
	Route::post('/bookmarks', [BookmarkController::class, 'store'])
								->name('bookmarks.preview');							

});

require __DIR__.'/auth.php';
