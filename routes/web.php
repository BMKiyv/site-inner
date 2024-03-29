<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\Departments\DepartmentsController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Projects\ProjectsController;

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
Route::post('/postevents',[EventsController::class,'postEvents']);
Route::delete('/events/{date}',[EventsController::class,'destroy']);


Route::resource('/departments', DepartmentsController::class);
Route::resource('/news', NewsController::class);
Route::resource('/projects', ProjectsController::class);