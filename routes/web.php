<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicinePersonalController;
use App\Http\Controllers\ImportController;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MedicinePersonalImport;

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

Auth::routes();

Route::get('/import', [ImportController::class, 'index'])->name('import');
Route::post('/uploadFile', [ImportController::class, 'uploadFile']);

Route::get('/table', [MedicinePersonalController::class, 'tableStats'])->name('table');
Route::post('/get-medicinePersonal', [MedicinePersonalController::class, 'getMedicinePersonal'])->name('get-medicinePersonal');
Route::post('/add-row', [MedicinePersonalController::class, 'addRow'])->name('add-row');
Route::post('/edit-row', [MedicinePersonalController::class, 'editRow'])->name('edit-row');
Route::post('/delete-row', [MedicinePersonalController::class, 'deleteRow'])->name('delete-row');

//Route::post('/avg-value', [MedicinePersonalController::class, 'averageValue'])->name('avg-value');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

