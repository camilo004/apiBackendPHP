<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaestrafrecuencialogController;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;



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
$token = csrf_token();


Route::get('/', function () {
    return view('welcome');
});













// Funcion de acceso a la vistas y autentica el acceso de estas, solo si se encuentra logeado.

