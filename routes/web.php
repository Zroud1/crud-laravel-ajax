<?php

use App\Http\Controllers\StudentController;
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


Route::get('students', [StudentController::class, 'index']);
Route::get('fetchStudent', [StudentController::class, 'fetchStudent']);
Route::post('students', [StudentController::class, 'store']);
Route::get('student/{id}', [StudentController::class, 'edit']);
Route::put('student/{id}', [StudentController::class, 'update']);
Route::delete('student/{id}', [StudentController::class, 'destroy']);



Route::get('/', function () {
    return view('student.student');
});
