<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DemandeDotationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventaireMaterielController;
use App\Http\Controllers\inventController;

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
    return view('dashboard.connexion');
});

Route::get('/findevie', function () {
    return view('dashboard.materielEnFinDeVie');
});

Route::get('/form', function () {
    return view('employeesForms/index');
}); 

Route::get('/formInventaire', function () {
    return view('miseADispositionForm/index');    
});

Route::get('/data', [TestController::class, 'test']);
Route::resource("dashboard", DashboardController::class)->names("dashboard");
Route::resource("demandeDotation", DemandeDotationController::class)->names("demandeDotation");
Route::resource("inventaireMateriel", InventaireMaterielController::class)->names("inventaire");
Route::get('/staff', [InventaireMaterielController::class, 'staff'])->name('inventaire.staff');

Route::resource("invent", inventController::class)->names("submit");


Route::get('/dispatch', [DashboardController::class, 'planDispatch'])->name('dashboard.planDispatch');
Route::get('/finvie', [InventaireMaterielController::class, 'finDeVie'])->name('dashboard.finDeVie');
