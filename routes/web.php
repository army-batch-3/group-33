<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

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
    return view('auth.login');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::get('Profile-View', [HomeController::class,'profile_view'])->name('profile_view');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('dashboard', [HomeController::class,'dashboard_lists'])->name('dashboard_lists');

    Route::get('/Manage-User', [AdminController::class, 'manageUser'])->name('manageUser');
    Route::post('Personal-Benefits-Store', [AdminController::class,'storeBenefits'])->name('storeBenefits');
    Route::post('Personal-Employment-Store', [AdminController::class,'storeEmployment'])->name('storeEmployment');
    Route::post('Personal-Reference-Store', [AdminController::class,'storeReference'])->name('storeReference');
    Route::post('PersonalInfo-Get', [AdminController::class,'getPersonalAllInfo'])->name('getPersonalAllInfo');
    Route::post('Personal-Info-Store', [AdminController::class,'storePersonalinfo'])->name('storePersonalinfo');
    Route::post('Personal-Info-Get', [AdminController::class,'getPersonalinfo'])->name('getPersonalinfo');

    Route::post('Info-Store', [AdminController::class,'infoUpdate'])->name('infoUpdate');
    Route::post('All-PersonalInfo-get', [AdminController::class,'getAllPersonal'])->name('getAllPersonal');

});
