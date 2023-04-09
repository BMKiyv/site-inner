<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\Departments\DepartmentsController;
use App\Http\Controllers\Documents\DocumentsController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Projects\ProjectsController;
use App\Http\Controllers\Photos\PhotosController;
use App\Http\Controllers\Users\UserController;

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

Route::get('/', [HomeController::class,'index'])->name('first');

Route::get('/getevents',[EventsController::class,'getEvents']);
Route::get('/getevents/{id}',[EventsController::class,'getEventsWithId']);
Route::post('/postevents',[EventsController::class,'postEvents']);
Route::post('/postevents/{id}',[EventsController::class,'postEventsWithId']);
Route::delete('/events/{date}',[EventsController::class,'destroy']);
Route::delete('/events/{id}/{date}',[EventsController::class,'destroyWithId']);
Route::get('/documents/{folder}/{name}/download',[DocumentsController::class,'download'])->name('documents.download');


Route::resource('/departments', DepartmentsController::class);
Route::resource('/news', NewsController::class);
Route::resource('/projects', ProjectsController::class);
Route::resource('/documents', DocumentsController::class);
Route::resource('/photos', PhotosController::class);
Auth::routes();

Route::get('/cabinet', [UserController::class, 'index'])->name('user');
