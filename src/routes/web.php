<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\WeightController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GoalSettingController;

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


Route::get('/register/step1', [RegisterController::class, 'showStep1'])->name('register.step1');
Route::post('/register/step1', [RegisterController::class, 'storeStep1'])->name('register.storeStep1');

Route::get('/register/step2', [RegisterController::class, 'showStep2'])->name('register.step2');
Route::post('/register/step2', [RegisterController::class, 'storeStep2'])->name('register.storeStep2');

Route::get('/weight_logs', [WeightController::class, 'index'])->middleware('auth')->name('weight_logs');
Route::get('/weight_logs/create', [WeightController::class, 'create'])->name('weight_logs.create');
Route::post('weight_logs', [WeightController::class, 'store'])->name('weight_logs.store');

Route::get('/weight_logs/goal_setting', [GoalSettingController::class, 'index'])->name('goal_setting.index');
Route::put('/weight_logs/goal_setting', [GoalSettingController::class, 'update'])->name('goal_setting.update');

Route::post('/logout', function(){
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/weight_logs/{id}', [WeightController::class, 'show'])->name('weight_logs.show');
Route::put('/weight_logs/{id}/update', [WeightController::class, 'update'])->name('weight_logs.update');
Route::delete('weight_logs/{id}/delete', [WeightController::class, 'destroy'])->name('weight_logs.delete');


