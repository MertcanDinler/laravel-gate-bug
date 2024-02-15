<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    if (\App\Models\User::count() === 0) {
     $user =    \App\Models\User::factory()->create();
    }else{
        $user = \App\Models\User::first();
    }

    \Illuminate\Support\Facades\Auth::login($user);
    \Illuminate\Support\Facades\Gate::authorize('some-permission');
    return view('welcome');
});
