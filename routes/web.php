<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
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
    return view('welcome');
});

Route::get('/students', [StudentController::class, 'index']); // To view students
Route::get('/students/create', [StudentController::class, 'create']); // For creating a new student
Route::post('/students/store', [StudentController::class, 'store']); // For storing a new student
Route::get('/students/{id}/edit', [StudentController::class, 'edit']); // For editing a student
Route::put('/students/{id}', [StudentController::class, 'update']); // For updating a student
Route::delete('/students/{id}', [StudentController::class, 'destroy']); // For deleting a student