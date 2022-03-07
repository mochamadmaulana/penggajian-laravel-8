<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'loginStore'])->name('login');
    Route::get('request/code', [\App\Http\Controllers\Auth\RequestCodeController::class, 'index'])->name('request.code');
    Route::post('request/code', [\App\Http\Controllers\Auth\RequestCodeController::class, 'store'])->name('request.code');
    Route::get('verifikasi/email', [\App\Http\Controllers\Auth\VerifikasiEmailController::class, 'index'])->name('verifikasi');
    Route::post('verifikasi/email', [\App\Http\Controllers\Auth\VerifikasiEmailController::class, 'store'])->name('verifikasi');
});




Route::middleware(['aktif','auth'])->group(function () {

    Route::get('logout', \App\Http\Controllers\Auth\LogoutController::class)->name('logout');
    // Route::get('dashboard', \App\Http\Controllers\DashboardController::class)->name('dashboard');
    Route::put('admin/users/{id}/edit-password', \App\Http\Controllers\Auth\ResetPasswordController::class)->name('changePassword');

    Route::middleware('role:administrator')->group(function () {
        // Route Administrator Dashboard
        Route::get('admin/dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('admin.dashboard');

        // Route Administrator Data User
        Route::resource('admin/users', \App\Http\Controllers\Admin\UserController::class);

        // Route Administrator Periode Absen
        Route::resource('admin/periode', \App\Http\Controllers\Admin\PeriodeController::class);

        // Route Administrator Jabatan
        Route::resource('admin/jabatan', \App\Http\Controllers\Admin\JabatanController::class);

        // Route Administrator Jabatan
        Route::resource('admin/cabang', \App\Http\Controllers\Admin\CabangController::class);
    });



    Route::middleware('role:manager')->group(function () {
        // route Manager Dashboard
        Route::get('manager/dashboard', \App\Http\Controllers\Manager\DashboardController::class)->name('manager.dashboard');
        Route::post('manager/import-absen', [\App\Http\Controllers\Manager\ImportAbsenController::class, 'import'])->name('manager.import');
        Route::post('manager/export-absen', [\App\Http\Controllers\Manager\ImportAbsenController::class, 'export'])->name('manager.export');

        Route::resource('manager/absen', \App\Http\Controllers\Manager\AbsenController::class);

        Route::resource('manager/karyawan', \App\Http\Controllers\Manager\KaryawanController::class);

    });



    Route::middleware('role:accounting')->group(function () {
        // Accounting Dashboard
        Route::get('accounting/dashboard', \App\Http\Controllers\Accounting\DashboardController::class)->name('accounting.dashboard');

        // Accounting Karyawan
        Route::resource('accounting/karyawan', \App\Http\Controllers\Accounting\KaryawanController::class)->names('accounting.karyawan');
        // Route::get('accounting/karyawan/{id}/detail', [AccountingKaryawanController::class, 'show'])->name('accounting.detailKaryawan');

        // // Accounting Gaji
        Route::resource('accounting/gaji', \App\Http\Controllers\Accounting\GajiController::class)->names('accounting.gaji');

        Route::resource('accounting/slip-gaji', \App\Http\Controllers\Accounting\SlipGajiController::class)->names('accounting.slip.gaji');
        // Route::post('accounting/gaji', [AccountingGajiController::class, 'store'])->name('accounting.gaji');
        // Route::put('accounting/gaji/{id}/update', [AccountingGajiController::class, 'update'])->name('accounting.gajiupdate');
    });

    Route::middleware('role:karyawan')->group(function () {
        // Accounting Dashboard
        Route::get('karyawan/dashboard', \App\Http\Controllers\Karyawan\DashboardController::class)->name('karyawan.dashboard');

        Route::resource('karyawan/gaji', \App\Http\Controllers\Karyawan\GajiController::class)->names('karyawan.gaji');

        Route::resource('karyawan/slip-gaji', \App\Http\Controllers\Karyawan\SlipGajiController::class)->names('karyawan.slip.gaji');

    });

});
