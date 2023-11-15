<?php

use App\Exports\CustomerExport;
use App\Exports\DriverExport;
use App\Exports\EmployeeExport;
use App\Exports\MonitoringInvoiceExport;
use App\Exports\LaporanPerjalananExport;
use App\Exports\MonitoringsExport;
use App\Exports\MonitoringSopirExport;
use App\Exports\RequestUangJalanExport;
use App\Exports\ScheduleExport;
use App\Exports\UnitExport;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LaporanPerjalananController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\MonitoringDetailController;
use App\Http\Controllers\MonitoringJulitaController;
use App\Http\Controllers\MonitoringSopirController;
use App\Http\Controllers\RequestUangJalanController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\UangJalanController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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
Route::get('storage-link', function(){
    Artisan::call('storage:link');
    return response()->json([
        'alert' => 'success',
        'message' => 'Storage Linked!'
    ]);
})->name('storage.link');
Route::redirect('/', 'login', 301);
// Route::prefix('auth/')->name('auth.')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'do_login'])->name('do_ogin');
// });
Route::middleware(['auth'])->group(function(){
    Route::get('home', [WebController::class, 'home'])->name('home');
    Route::get('monitoringSopir/inputDO/{id}', [MonitoringSopirController::class, 'inputDO'])->name('monitoringSopir.inputDO');
    Route::patch('monitoringSopir/uploadDO/{id}', [MonitoringSopirController::class, 'uploadDO'])->name('monitoringSopir.uploadDO');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('profile/edit', [AuthController::class, 'profileEdit'])->name('profile.edit');
    Route::patch('profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::resource('history', HistoryController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('driver', DriverController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('schedule', ScheduleController::class);
    Route::resource('reqUJ', RequestUangJalanController::class);
    Route::resource('laporanPerjalanan', LaporanPerjalananController::class);
    Route::resource('monitoring', MonitoringController::class);
    Route::resource('monitoringJulita', MonitoringJulitaController::class);
    Route::resource('users', UserController::class);
    Route::resource('uangJalan', UangJalanController::class);
    Route::resource('monitoringSopir', MonitoringSopirController::class);

    Route::get('driver-resign/{id}', [DriverController::class, 'resign'])->name('drivers.resign');
    Route::get('sopir-info', [SopirController::class, 'info'])->name('sopir.info');
    Route::patch('monitoringSopir/berangkat/{id}', [MonitoringSopirController::class, 'berangkat'])->name('monitoringSopir.berangkat');
    Route::patch('monitoringSopir/kirimBarang/{id}', [MonitoringSopirController::class, 'kirim_barang'])->name('monitoringSopir.kirim.barang');
    Route::patch('monitoringSopir/selesai/{id}', [MonitoringSopirController::class, 'selesai'])->name('monitoringSopir.selesai');
    Route::patch('monitoringSopir/done/{id}', [MonitoringSopirController::class, 'done'])->name('monitoringSopir.done');
    Route::patch('monitoringSopir/control/{id}', [MonitoringSopirController::class, 'control'])->name('monitoringSopir.control');

    Route::patch('monitoringDetailApprove/{monitoringDetail}', [MonitoringDetailController::class, 'approve'])->name('monitoringDetail.approveFoto');
    Route::patch('monitoringDetailReject/{monitoringDetail}', [MonitoringDetailController::class, 'reject'])->name('monitoringDetail.rejectFoto');

    // Route::patch('monitoring/control/{id}', [MonitoringController::class, 'control'])->name('monitoring.control');
    // Route::patch('monitoring/berangkat/{id}', [MonitoringController::class, 'berangkat'])->name('monitoring.berangkat');
    // Route::patch('monitoring/kirimBarang/{id}', [MonitoringController::class, 'kirim_barang'])->name('monitoring.kirim.barang');
    // Route::patch('monitoring/selesai/{id}', [MonitoringController::class, 'selesai'])->name('monitoring.selesai');
    // Route::patch('monitoring/done/{id}', [MonitoringController::class, 'done'])->name('monitoring.done');
    // Route::patch('monitoring/control/{id}', [MonitoringController::class, 'control'])->name('monitoring.control');

    Route::get('export.unit', [UnitExport::class, 'export'])->name('export.unit');
    Route::get('export.driver', [DriverExport::class, 'export'])->name('export.driver');
    Route::get('export.customer', [CustomerExport::class, 'export'])->name('export.customer');
    Route::get('export.schedule', [ScheduleExport::class, 'export'])->name('export.schedule');
    Route::get('export.reqUJ', [RequestUangJalanExport::class, 'export'])->name('export.reqUJ');
    Route::get('export.laporanPerjalanan', [LaporanPerjalananExport::class, 'export'])->name('export.laporanPerjalanan');
    Route::get('export.employee', [EmployeeExport::class, 'export'])->name('export.employee');
    Route::get('export.monitoring', [MonitoringsExport::class, 'export'])->name('export.monitoring');
    Route::get('export.monitoringSopir', [MonitoringSopirExport::class, 'export'])->name('export.monitoringSopir');
    Route::get('export.monitoring.invoice/{monitoring}', [MonitoringController::class, 'generateExcel'])->name('export.monitoring.invoice');
});
