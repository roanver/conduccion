<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnviosController; 

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

Route::get('/',[EnviosController::class, 'mostrar']);

Route::get('/offline', function(){
    return view('vendor.laravelpwa.offline');
});
    

Route::post('agrear', [EnviosController::class, 'crear'])->name('crear');

Route::post('aumentar/{id}', [EnviosController::class, 'actualizar'])->name('actualizar');


