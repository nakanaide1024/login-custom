<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use Laravel\Ui\AuthCommand;

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


Route::group(['middleware' => ['guest']], function(){
  //ログインホーム表示
  Route::get('/', [AuthController::class, 'showLogin'])->name('login.show');
  //ログイン処理
  Route::post('Login', [AuthController::class, 'login'])->name('login');
});


Route::group(['middleware' => ['auth']], function(){
    //ホーム画面
    Route::get('home', function () {
        return view('home');
    })->name('home');
    //ログアウト機能
    Route::post('logout',[AuthController::class,'logout'])->name('logout');
});