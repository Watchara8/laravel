<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataChallengeController;

Route::resource('/', DataChallengeController::class);
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/',[DataChallengeController::class,'index'])->name('index');
// Route::get('/calculate',[DataChallengeController::class,'calculate'])->name('cal');

