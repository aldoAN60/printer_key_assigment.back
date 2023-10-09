<?php

use App\Http\Controllers\printer_registryController;
use App\Http\Controllers\printersController;
use App\Http\Controllers\viewRegistryController;
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
Route::get('/api/printers', [printersController::class,'getPrinters'])->name('getPrinters');
route::get('/debug',[printer_registryController::class, 'debug']);
Route::post('/api/registry-post',[printer_registryController::class, 'create'])->name('create.registry');
Route::get('/api/duplicateCodes', [printer_registryController::class,'duplicateCodes'])->name('duplicateCodes');
Route::get('/api/duplicateRegistry', [printer_registryController::class, 'duplicateRegistry']);
Route::get('/api/getRegistry', [viewRegistryController::class,'getRegistry']);