<?php

use App\Exports\MutasiPerabotanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PerabotanExport;
use Illuminate\Http\Request;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MutasiPerabotanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PerabotanController;


use App\Http\Controllers\ScanController;
use App\Http\Middleware\IsSupervisor;
use App\Models\Kategori;
use App\Models\Pengguna;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;


Route::get('/tes-qr', function () {
    return view('test-qr');
});

// Route Public untuk QR Code
Route::get('/perabotan/qrcode/{kode}', [PerabotanController::class, 'qrcodeByKode'])->name('perabotan.qrcode');
Route::get('/perabotan/qrcode-generate', [App\Http\Controllers\PerabotanController::class, 'generateQrCode']);


// Route::middleware('guest')->group(function () {
Route::get('/cek-login', function () {
    dd(\Illuminate\Support\Facades\Auth::check(), \Illuminate\Support\Facades\Auth::user());
});


// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Scan routes
Route::get('/scan', [ScanController::class, 'index'])->name('scan');
Route::post('/scan-result', [PerabotanController::class, 'scan'])->name('scan.result');

//cetakqr
Route::get('/perabotan/cetakqr/{kode}', [PerabotanController::class, 'cetakqr'])->name('perabotan.cetakqr');


// });
// Route::get('/perabotan/{kode}/detail', [PerabotanController::class, 'publicDetail'])->name('perabotan.public.detail');
Route::get('/perabotan/detail/{id}', [PerabotanController::class, 'publicDetail'])->name('perabotan.public.detail');



// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// qrode routes


// Export route
Route::get('/pengguna/export', [PenggunaController::class, 'export'])->name('pengguna.export');
Route::get('/perabotan/export', [PerabotanController::class, 'export'])->name('perabotan.export');


// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::group(['prefix' => 'inventory'], function () {
        Route::resource('kategori', CategoryController::class)->except('show');
        Route::resource('lokasi', LocationController::class);
        // Route::resource('mutasi', MutasiPerabotanController::class);


    });

    Route::resource('pengguna', PenggunaController::class)->except('show')->middleware(IsSupervisor::class);
    Route::get('/pengguna/{pengguna}', [PenggunaController::class, 'show']);
    Route::get('/pengguna/{pengguna}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    // Route::put('/pengguna/{pengguna}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/{pengguna}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');


    //Profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    //Mutasi Perabotan routes
    Route::get('mutasi', [MutasiPerabotanController::class, 'index'])->name('mutasi.index');
    Route::get('mutasi/create', [MutasiPerabotanController::class, 'create'])->name('mutasi.create');
    Route::post('mutasi', [MutasiPerabotanController::class, 'store'])->name('mutasi.store');
    Route::get('/mutasi/export', function (\Illuminate\Http\Request $request) {
        $type = $request->query('type', 'xlsx');

        if (!in_array($type, ['xlsx', 'csv', 'xls'])) {
            abort(400, 'Tipe file tidak valid.');
        }
        return Excel::download(new MutasiPerabotanExport, 'mutasi.' . $type);
    });
    // Edit mutasi (manual seperti profile)
    Route::get('mutasi/{mutasi}/edit', [MutasiPerabotanController::class, 'edit'])->name('mutasi.edit');
    Route::put('mutasi/{mutasi}', [MutasiPerabotanController::class, 'update'])->name('mutasi.update');


    Route::get('/perabotan/qrcode', [PerabotanController::class, 'getQrCode'])->name('perabotan.qrcode');
    Route::get('/perabotan/detail/{kode}', [PerabotanController::class, 'detailByKode'])->name('perabotan.detail');

    Route::resource('perabotan', PerabotanController::class);

    Route::get('/perabotan/export', function (Request $request) {
        $type = $request->query('type', 'xlsx'); // INI AKAN BERFUNGSI setelah import benar

        if (!in_array($type, ['xlsx', 'csv', 'xls'])) {
            abort(400, 'Tipe file tidak valid.');
        }
        return Excel::download(new \App\Exports\PerabotanExport, 'perabotan.' . $type);
    });

});

require __DIR__ . '/auth.php';
