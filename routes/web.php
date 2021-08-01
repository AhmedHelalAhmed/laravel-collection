<?php

use App\Http\Controllers\MethodMergeController;
use App\Http\Controllers\MethodUnionController;
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
    return view('welcome');
});

Route::group(['namespace' => '\Rap2hpoutre\LaravelLogViewer'], function()  {
    Route::get('logs', 'LogViewerController@index');
});
Route::get('/merge', MethodMergeController::class);
Route::get('/union', MethodUnionController::class);
