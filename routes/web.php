<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactTagController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MessageTemplateController;
use App\Http\Controllers\TagController; 
use App\Http\Controllers\ImportController; 

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
	return redirect('dashboard');
    return view('welcome');
});


//TWILIO_FROM
 
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect()->route('admin.index');
})->name('dashboard');
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    Route::resource('contacts',ContactController::class);
    Route::resource('contact-tags',ContactTagController::class);
    Route::resource('messages',MessageController::class);
    Route::resource('tags',TagController::class);
    Route::resource('message-templates',MessageTemplateController::class);
    Route::resource('imports',ImportController::class);
});
Auth::routes(['register' => false]);

Route::post('register',function(){return redirect('/login');});
Route::get('register',function(){return redirect('/login');});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
