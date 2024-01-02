<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

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

Route::middleware(['web', 'throttle:60,1'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/login', [AuthManager::class, 'login'])->name('login');
    Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

    Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
    Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

    Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
    Route::group(['middleware' => 'auth'], function (){
        Route::get('/profile', function () {
            return 'hi';
        });
    });
});

Route::get('/list', function () {
    return view('listings', [
        'heading' => 'latest listings',
        'listings' => 
        [
            'id' => 1,
            'title' => 'listing 1',
            'diecription'  => 'Lorem Ipsum is simply dummy text of the printing
            and typesetting industry. Lorem Ipsum has been the industrys
            standard dummy text ever since the 1500s, when an unknown printer 
            took a galley of type and scrambled it to make a type specimen book.'
        ],
        [
            'id' => 1,
            'title' => 'listing 1',
            'diecription'  => 'Lorem Ipsum is simply dummy text of the printing
            and typesetting industry. Lorem Ipsum has been the industrys
            standard dummy text ever since the 1500s, when an unknown printer 
            took a galley of type and scrambled it to make a type specimen book.'
        ]
    ]);
});
