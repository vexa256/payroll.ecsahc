<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HumanResourceDataSettingsController;

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
Route::middleware(['auth'])->group(function () {

    Route::controller(StaffController::class)->group(function () {

        Route::get('AcceptSelectStaffMemberBeneficiary', 'AcceptSelectStaffMemberBeneficiary')->name('AcceptSelectStaffMemberBeneficiary');

        Route::get('SelectSelectStaffMemberBeneficiary', 'SelectSelectStaffMemberBeneficiary')->name('SelectSelectStaffMemberBeneficiary');

        Route::get('EndContract/{id}', 'EndContract')->name('EndContract');

        Route::post('ExtendContract', 'ExtendContract')->name('ExtendContract');
        Route::post('dashboard', 'MgtEmp')->name('dashboard');
        Route::post('VirtualOffice', 'MgtEmp')->name('VirtualOffice');
        Route::get('/', 'MgtEmp')->name('MgtEmp');
        Route::get('MgtEmp', 'MgtEmp')->name('MgtEmp');

    });

    Route::controller(HumanResourceDataSettingsController::class)->group(function () {

        Route::get('MgtPayrollLabels', 'MgtPayrollLabels')->name('MgtPayrollLabels');
        Route::get('MgtStaffRoles', 'MgtStaffRoles')->name('MgtStaffRoles');
        Route::get('MgtClusters', 'MgtClusters')->name('MgtClusters');
        Route::get('MgtDepts', 'MgtDepts')->name('MgtDepts');

    });

    Route::controller(CrudController::class)->group(function () {

        Route::get('MassDelete/{TableName}/{id}', 'MassDelete')->name('MassDelete');

        Route::post('MassUpdate', 'MassUpdate')->name('MassUpdate');

        Route::post('MassInsert', 'MassInsert')->name('MassInsert');
    });

    // Route::get('/', [AppController::class, 'VirtualOffice'])->name('VirtualOffice');
    // Route::get('/dashboard', [AppController::class, 'VirtualOffice'])->name('dashboard');
    // Route::get('/VirtualOffice', [AppController::class, 'VirtualOffice'])->name('VirtualOffice');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
