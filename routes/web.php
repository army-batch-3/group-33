<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WarehouseController;

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
Route::post('Update-Info-Register', [HomeController::class, 'updateInfo'])->name('updateInfo');
Route::get('update-info', [HomeController::class,'update_info'])->name('update-info');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('Profile-View', [HomeController::class, 'profile_view'])->name('profile_view');

    Route::get('dashboard', [HomeController::class, 'dashboard_lists'])->name('dashboard_lists');


    Route::group(['middleware' => 'can:Roles - Permission',  'middleware' => 'can:Manage Employee'], function () {
        Route::get('/Manage-User', [AdminController::class, 'manageUser'])->name('manageUser');
        Route::post('Personal-Benefits-Store', [AdminController::class, 'storeBenefits'])->name('storeBenefits');
        Route::post('Personal-Employment-Store', [AdminController::class, 'storeEmployment'])->name('storeEmployment');
        Route::post('Personal-Reference-Store', [AdminController::class, 'storeReference'])->name('storeReference');
        Route::post('PersonalInfo-Get', [AdminController::class, 'getPersonalAllInfo'])->name('getPersonalAllInfo');
        Route::post('Personal-Info-Store', [AdminController::class, 'storePersonalinfo'])->name('storePersonalinfo');
        Route::post('Personal-Info-Get', [AdminController::class, 'getPersonalinfo'])->name('getPersonalinfo');
    });

    Route::group(['middleware' => 'can:Roles - Permission',  'middleware' => 'can:Assign Roles'], function () {
        Route::get('Manage-Roles-Permission', [AdminController::class, 'permission_role'])->name('permission_role');
        Route::post('Permission-Get', [AdminController::class, 'getPermission'])->name('getPermission');
        Route::post('Roles-Select-Get', [AdminController::class, 'getRolesAvailable'])->name('getRolesAvailable');
        Route::post('Roles-Select-Store', [AdminController::class, 'storeRoleSelect'])->name('storeRoleSelect');
        Route::post('Permission-Store', [AdminController::class, 'storePermission'])->name('storePermission');
        Route::post('Roles-Store', [AdminController::class, 'storeRole'])->name('storeRole');
        Route::post('Roles-Get', [AdminController::class, 'getRoles'])->name('getRoles');
        Route::post('User-Get', [AdminController::class, 'getLogin'])->name('getLogin');
    });


    Route::post('Supplier-Store', [SupplierController::class, 'storeSupplier'])->name('storeSupplier');
    Route::post('Supplier-Get', [SupplierController::class, 'getSupplier'])->name('getSupplier');
    // Route::get('/Suppliers', function () { return view('suppliers'); })->name('supplier');
    Route::get('/Suppliers', [SupplierController::class, 'supplier'])->name('supplier');

    Route::get('/Assets', [AssetController::class, 'index'])->name('assets');
    Route::post('/Assets-Get', [AssetController::class, 'getAssets'])->name('getAssets');
    Route::post('/Assets-Store', [AssetController::class, 'storeAssets'])->name('storeAssets');

    // Warehouse    
    Route::post('/Warehouse-Store', [WarehouseController::class, 'storeWarehouse'])->name('storeWarehouse');
    Route::post('Warehouse-Get', [WarehouseController::class, 'getWarehouse'])->name('getWarehouse');
    Route::get('/warehouse',[WarehouseController::class, 'warehouse'])->name('warehouse.view');

    Route::post('Info-Store', [AdminController::class, 'infoUpdate'])->name('infoUpdate');
    Route::post('All-PersonalInfo-get', [AdminController::class, 'getAllPersonal'])->name('getAllPersonal');
});
