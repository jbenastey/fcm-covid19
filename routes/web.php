<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\HomeController;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');
    Route::resource('data',DataController::class);
    Route::resource('dataset',DatasetController::class)->except([
        'create'
    ]);
    Route::get('dataset/{id}/create',[DatasetController::class,'create'])->name('dataset.create');
});

