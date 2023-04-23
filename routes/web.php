<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PayrollDataController;
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

    Route::controller(FileController::class)->group(function () {

        Route::get('createManagementFiles', 'createManagementFiles')->name('createManagementFiles');

    });

    Route::controller(PayrollController::class)->group(function () {

        Route::get('SetPayroll', 'SetPayroll')->name('SetPayroll');

        Route::get('PayrollSelectStaff', 'PayrollSelectStaff')->name('PayrollSelectStaff');

        Route::get('PayrollSelectPayroll', 'PayrollSelectPayroll')->name('PayrollSelectPayroll');

    });

    Route::controller(PayrollDataController::class)->group(function () {

        Route::get('MgtTaxes', 'MgtTaxes')->name('MgtTaxes');

        Route::get('MgtConstantDeductions', 'MgtConstantDeductions')->name('MgtConstantDeductions');

        Route::get('MgtPercentageDeductions', 'MgtPercentageDeductions')->name('MgtPercentageDeductions');

        Route::get('MgtPercentageBenefits', 'MgtPercentageBenefits')->name('MgtPercentageBenefits');

        Route::get('MgtConstantBenefits', 'MgtConstantBenefits')->name('MgtConstantBenefits');

    });

    Route::controller(StaffController::class)->group(function () {

        Route::get('SoonExpiringContracts', 'SoonExpiringContracts')->name('SoonExpiringContracts');

        Route::get('MgtStaffDocs', 'MgtStaffDocs')->name('MgtStaffDocs');

        Route::get('StaffDocsSelect', 'StaffDocsSelect')->name('StaffDocsSelect');

        Route::get('ExpiredContracts', 'ExpiredContracts')->name('ExpiredContracts');

        Route::get('StaffDemographics', 'StaffDemographics')->name('StaffDemographics');

        Route::get('StaffContractValidity', 'StaffContractValidity')->name('StaffContractValidity');

        Route::get('MgtStaffBenefits', 'MgtStaffBenefits')->name('MgtStaffBenefits');

        Route::get('SelectStaffForBenefits', 'SelectStaffForBenefits')->name('SelectStaffForBenefits');

        Route::get('Test', 'Test')->name('Test');

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
require __DIR__ . '/paul.php';
