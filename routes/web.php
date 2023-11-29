<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use \App\Http\Controllers\CountryController;
use \App\Http\Controllers\EmployeeController;
use \App\Http\Controllers\DepartmentController;
use \App\Http\Controllers\FolderController;
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



Route::group(['middleware' => ['auth:sanctum'], 'prefix' => '/', 'verified'], function () {
    Route::get('folder', [FolderController::class,'index'])->name('folder');
    Route::get('/folder/tambah', [FolderController::class,'tambahFolder'])->name('tambahFolder');
    Route::post('/folder/insert', [FolderController::class,'insertFolder'])->name('insertFolder');
    Route::post('/folder', [FolderController::class,'updateFolder'])->name('updateFolder');
    Route::get('/folder/edit/{id}', [FolderController::class,'editFolder']);
    Route::get('/folder/deletes/{id}', [FolderController::class,'deletesFolder']);
    Route::get('/folder/delete/{id}', [FolderController::class,'deleteFolder']);
    Route::get('/employee', [EmployeeController::class,'index']);
    Route::get('/department', [DepartmentController::class,'index'])->name('department');
    Route::get('/country', [CountryController::class,'index'])->name('indexCountry');
    Route::get('/country/create', [CountryController::class,'createCountry'])->name('createCountry');
    Route::get('/department/create', [DepartmentController::class,'createDepartment'])->name('createDepartment');
    Route::post('/department/create', [DepartmentController::class,'postDepartment'])->name('postDept');
    Route::post('/country/add', [CountryController::class,'tambahCountry'])->name('addCountry');
    Route::get('/country/edit/{id}', [CountryController::class,'editCountry']);
    Route::post('/country', [CountryController::class,'updateCountry'])->name('updateCountry');
    Route::get('/country/deletes/{id}', [CountryController::class,'deletesCountry']);
    Route::get('/country/delete/{id}', [CountryController::class,'deleteCountry']);
    Route::get('', [DashboardController::class, 'index']);

    Route::get('/department/soft-delete/{id}', [DepartmentController::class,'softDelete']);
    Route::get('/department/permanent-delete/{id}', [DepartmentController::class,'permanentDelete']);
    Route::get('/department/edit/{slug}', [DepartmentController::class,'editDepartment'])->name('editDepartment');
    Route::post('/department/edit', [DepartmentController::class,'updateDepartment'])->name('updateDepartment');
    Route::get('/department/search', [DepartmentController::class,'searchDepartmentPost'])->name('searchDepartmentPost');

    
});
Route::get('/logout',[LoginController::class,'logout']);
Route::get('login',[LoginController::class,'index'])->name("login")->middleware('guest');
Route::get('register',[LoginController::class,'register'])->name("register")->middleware('guest');

Route::post('/login',[LoginController::class,'postLogin'])->name('postLogin')->middleware('guest');
Route::post('/register',[LoginController::class,'postRegister'])->name('postRegister')->middleware('guest');

// Route::patch('/folder/{id}',[
//     'tambahdata' => 'FolderController@tambahdata'
// ]);