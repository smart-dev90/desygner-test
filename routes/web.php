<?php

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
    return view('main');
});

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BackendController;

Route::get('frontend', [FrontendController::class, 'home'])->name('frontend.home');

Route::get('backend', [BackendController::class, 'home'])->name('backend.home');
Route::post('doUpload', [BackendController::class, 'doUpload'])->name('backend.doUpload');

Route::get('backend/url', [BackendController::class, 'url'])->name('backend.url');
Route::post('doUrl', [BackendController::class, 'doUrl'])->name('backend.doUrl');