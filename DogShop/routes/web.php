<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoleController;
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
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::resource('/dogs', DogController::class)->parameters([
    'dogs' => 'dog'
]);

Route::resource('/member', MemberController::class)->parameters([
    'member' => 'user'
])->only([
    'show'
]);

Route::resource('/contact', MessageController::class)->parameters([
    'contact' => 'message'
])->only([
    'create', 'store'
]);

Route::resource('cart', CartController::class)->only([
    'show', 'store', 'destroy',
]);

Route::Post('cart/{cart}', [CartController::class, 'order'])->name('cart.order');

//Profile routes are being handled by vendor files (Jetstream)

Route::middleware(['auth:sanctum', 'verified', 'password.confirm', 'role:vendor|editor|moderator|admin|owner'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/console', function () {
        return view('admin.console');
    })->name('console');

    Route::resource('/role', RoleController::class);

    Route::resource('/inbox', MessageController::class)->parameters([
        'inbox' => 'message'
    ])->only([
        'index', 'show', 'edit', 'update',
    ]);

    Route::get('/members', [MemberController::class, 'index'])->name('members.index');

    Route::resource('/member', MemberController::class)->parameters([
        'member' => 'user'
    ])->only([
        'edit', 'update', 'destroy'
    ]);
});

Route::get('/cookie', function (){
    return view('cookie');
})->name('cookie');


Route::redirect('/welcome', '/')->name('welcome')->middleware('verified');
Route::redirect('/home', '/')->name('home');
Route::redirect('/dashboard', '/')->name('dashboard');
