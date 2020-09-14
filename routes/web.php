<?php
use Illuminate\Support\Str;
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


Auth::routes();
Route::get('/', function () {

    return view('welcome');
});
Route::get('/home', function () {

    return view('home');
});
Route::get('/deposito', function () {

    return view('home');
});
Route::get('/saque', function () {

    return view('home');
});


Route::get('contas/setExtrato/{id}','ControllerContas@setExtrato');