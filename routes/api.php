<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->group(function () {
    Route::resource('students', StudentController::class);
    Route::resource('assignments', AssignmentController::class);
    Route::get('students/grade/{id}', [StudentController::class, 'grade']);
    Route::get('assignments/grade/{id}', [AssignmentController::class, 'grade']);
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::post('students/update_score', [StudentController::class, 'updateScore']);
});
