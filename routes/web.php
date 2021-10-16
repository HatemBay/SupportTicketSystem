<?php

use App\Http\Controllers\Backend\ChangePasswordController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::resource('tickets', TicketController::class);
// Route::post('users/{user}/change-password', [ChangePasswordController::class, 'change_password'])->name('users.change.password');

// Route::get('users', function () {
//      User::paginate(2);
//      return view('departments.index');
//     });

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
