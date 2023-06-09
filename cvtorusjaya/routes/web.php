<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BahanbangunanController;
use App\Http\Controllers\Admin\peralatankeamananController;
use App\Http\Controllers\Admin\peralatankonstruksiController;
use App\Http\Controllers\Admin\peralatanlistrikController;
use App\Http\Controllers\Admin\peralatantanamanController;
use App\Http\Controllers\Admin\rumahtanggaController;
use App\Http\Controllers\Admin\informasitokoController;
use App\Http\Controllers\client\clientController;


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
    return view('dashboard');
});

Route::get('/dashboard', function () {
    $roleName = Auth::user()->roles()->first()->name;
    if ($roleName == 'adminr') {
        return view('admin.home');
    } elseif ($roleName == 'user') {
        return view('client.welcome');
    } else {
        abort(403);
    }
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profil.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//admin

Route::prefix('admin')->group(function () {
    Route::get('/home',[BahanbangunanController::class,'home'])->name('admin.home');
    Route::get('bahanbangunan', [BahanbangunanController::class, 'index'])->name('admin.bahanbangunan.bahanbangunan');
    Route::get('bahanbangunan/create', [BahanbangunanController::class, 'create'])->name('admin.bahanbangunan.create');
    Route::post('bahanbangunan', [BahanbangunanController::class, 'store'])->name('admin.bahanbangunan.store');
    Route::get('bahanbangunan/{bahanbangunan}/edit', [BahanbangunanController::class, 'edit'])->name('admin.bahanbangunan.edit');
    Route::put('bahanbangunan/{bahanbangunan}', [BahanbangunanController::class, 'update'])->name('admin.bahanbangunan.update');
    Route::delete('bahanbangunan/{bahanbangunan}', [BahanbangunanController::class, 'destroy'])->name('admin.bahanbangunan.destroy');
    //Route::get('/profile', [ProfileController::class, 'adminedit'])->name('admin.profile.edit');
});

Route::prefix('admin')->group(function () {
    Route::get('alatlistrik', [peralatanlistrikController::class, 'index'])->name('admin.alatlistrik.peralatanlistrik');
    Route::get('alatlistrik/create', [peralatanlistrikController::class, 'create'])->name('admin.alatlistrik.create');
    Route::post('alatlistrik', [peralatanlistrikController::class, 'store'])->name('admin.alatlistrik.store');
    Route::get('alatlistrik/{peralatanlistrik}/edit', [peralatanlistrikController::class, 'edit'])->name('admin.alatlistrik.edit');
    Route::put('alatlistrik/{peralatanlistrik}', [peralatanlistrikController::class, 'update'])->name('admin.alatlistrik.update');
    Route::delete('alatlistrik/{peralatanlistrik}', [peralatanlistrikController::class, 'destroy'])->name('admin.alatlistrik.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('alatkeamanan', [peralatankeamananController::class, 'index'])->name('admin.alatkeamanan.peralatankeamanan');
    Route::get('alatkeamanan/create', [peralatankeamananController::class, 'create'])->name('admin.alatkeamanan.create');
    Route::post('alatkeamanan', [peralatankeamananController::class, 'store'])->name('admin.alatkeamanan.store');
    Route::get('alatkeamanan/{peralatankeamanan}/edit', [peralatankeamananController::class, 'edit'])->name('admin.alatkeamanan.edit');
    Route::put('alatkeamanan/{peralatankeamanan}', [peralatankeamananController::class, 'update'])->name('admin.alatkeamanan.update');
    Route::delete('alatkeamanan/{peralatankeamanan}', [peralatankeamananController::class, 'destroy'])->name('admin.alatkeamanan.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('alatrt', [rumahtanggaController::class, 'index'])->name('admin.alatrt.rumahtangga');
    Route::get('alatrt/create', [rumahtanggaController::class, 'create'])->name('admin.alatrt.create');
    Route::post('alatrt', [rumahtanggaController::class, 'store'])->name('admin.alatrt.store');
    Route::get('alatrt/{rumahtangga}/edit', [rumahtanggaController::class, 'edit'])->name('admin.alatrt.edit');
    Route::put('alatrt/{rumahtangga}', [rumahtanggaController::class, 'update'])->name('admin.alatrt.update');
    Route::delete('alatrt/{rumahtangga}', [rumahtanggaController::class, 'destroy'])->name('admin.alatrt.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('alattanaman', [peralatantanamanController::class, 'index'])->name('admin.alattanaman.peralatantanaman');
    Route::get('alattanaman/create', [peralatantanamanController::class, 'create'])->name('admin.alattanaman.create');
    Route::post('alattanaman', [peralatantanamanController::class, 'store'])->name('admin.alattanaman.store');
    Route::get('alattanaman/{peralatantanaman}/edit', [peralatantanamanController::class, 'edit'])->name('admin.alattanaman.edit');
    Route::put('alattanaman/{peralatantanaman}', [peralatantanamanController::class, 'update'])->name('admin.alattanaman.update');
    Route::delete('alattanaman/{peralatantanaman}', [peralatantanamanController::class, 'destroy'])->name('admin.alattanaman.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('alatkonstruksi', [peralatankonstruksiController::class, 'index'])->name('admin.alatkonstruksi.peralatankonstruksi');
    Route::get('alatkonstruksi/create', [peralatankonstruksiController::class, 'create'])->name('admin.alatkonstruksi.create');
    Route::post('alatkonstruksi', [peralatankonstruksiController::class, 'store'])->name('admin.alatkonstruksi.store');
    Route::get('alatkonstruksi/{peralatankonstruksi}/edit', [peralatankonstruksiController::class, 'edit'])->name('admin.alatkonstruksi.edit');
    Route::put('alatkonstruksi/{peralatankonstruksi}', [peralatankonstruksiController::class, 'update'])->name('admin.alatkonstruksi.update');
    Route::delete('alatkonstruksi/{peralatankonstruksi}', [peralatankonstruksiController::class, 'destroy'])->name('admin.alatkonstruksi.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('informasi', [informasitokoController::class, 'index'])->name('admin.informasi.informasitoko');
    Route::get('informasi/create', [informasitokoController::class, 'create'])->name('admin.informasi.create');
    Route::post('informasi', [informasitokoController::class, 'store'])->name('admin.informasi.store');
    Route::get('informasi/{informasitoko}/edit', [informasitokoController::class, 'edit'])->name('admin.informasi.edit');
    Route::put('informasi/{informasitoko}', [informasitokoController::class, 'update'])->name('admin.informasi.update');
    Route::delete('informasi/{informasitoko}', [informasitokoController::class, 'destroy'])->name('admin.informasi.destroy');
});

Route::get('/',[clientController::class,'index'])->name('client.welcome');
Route::prefix('client')->group(function () {
    Route::get('/bahanbangunan',[clientController::class,'bahanbangunan'])->name('client.bahanbangunan');
    Route::get('/peralatankeamanan',[clientController::class,'keamanan'])->name('client.alatkeamanan');
    Route::get('/peralatankonstruksi',[clientController::class,'alatkonstruksi'])->name('client.alatkonstruksi');
    Route::get('/peralatanlistrik',[clientController::class,'peralatanlistrik'])->name('client.alatlistrik');
    Route::get('/rumahtangga',[clientController::class,'rumahtangga'])->name('client.alatrt');
    Route::get('/peralatantanaman',[clientController::class,'tanaman'])->name('client.alattanaman');
    Route::get('/about',[clientController::class,'about'])->name('client.about');
    Route::get('/allproduct', [clientController::class,'all'])->name('client.allproduct');
    Route::get('/data', [clientController::class,'admin'])->name('admin.data');
    Route::get('/data', [clientController::class,'user'])->name('admin.data');
    Route::get('/', [clientController::class,'stok'])->name('client.dashboard');
    // Route::get('/data', [clientController::class,'getTotalStock'])->name('admin.data');


    Route::get('/bahanbangunan/{id}', [BahanBangunanController::class, 'show'])->name('client.bahanbangunan.show');
    Route::get('/peralatankeamanan/{id}', [peralatankeamananController::class, 'show'])->name('client.alatkeamanan.show');
    Route::get('/peralatankonstruksi/{id}', [peralatankonstruksiController::class, 'show'])->name('client.alatkonstruksi.show');
    Route::get('/peralatanlistrik/{id}', [peralatanlistrikController::class, 'show'])->name('client.alatlistrik.show');
    Route::get('/peralatantanaman/{id}', [peralatantanamanController::class, 'show'])->name('client.alattanaman.show');
    Route::get('/rumahtangga/{id}', [rumahtanggaController::class, 'show'])->name('client.alatrt.show');

    Route::post('bahanbangunan/{id}/komentar', [BahanBangunanController::class, 'storeKomentar'])->name('bahanbangunan.komentar.store');
    Route::post('editbahanbangunan/{id}/komentar', [BahanbangunanController::class, 'updateKomentar'])->name('bahanbangunan.update.store'); 
    Route::post('peralatanlistrik/{id}/komentar', [peralatanlistrikController::class, 'storeKomentar'])->name('peralatanlistrik.komentar.store');
    Route::post('editperalatanlistrik/{id}/komentar', [peralatanlistrikController::class, 'updateKomentar'])->name('peralatanlistrik.update.store');
    Route::post('peralatankeamanan/{id}/komentar', [peralatankeamananController::class, 'storeKomentar'])->name('alatkeamanan.komentar.store');
    Route::post('rumahtangga/{id}/komentar', [rumahtanggaController::class, 'storeKomentar'])->name('peralatanrumahtangga.komentar.store');
    Route::post('peralatankonstruksi/{id}/komentar', [peralatankonstruksiController::class, 'storeKomentar'])->name('peralatankonstruksi.komentar.store');
    Route::post('peralatantanaman/{id}/komentar', [peralatantanamanController::class, 'storeKomentar'])->name('peralatantanaman.komentar.store');

});
