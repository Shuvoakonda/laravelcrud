<?php

use App\Http\Controllers\CrudControlller;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [CrudControlller::class, 'showData']);
Route::get('/add_data', [CrudControlller::class, 'addData']);
Route::post('/store_data', [CrudControlller::class, 'storeData']);
Route::get('/edit_data/{id}', [CrudControlller::class, 'editData']);
Route::post('/update_data/{id}', [CrudControlller::class, 'updateData']);
Route::get('/delete_data/{id}', [CrudControlller::class, 'deleteData']);
