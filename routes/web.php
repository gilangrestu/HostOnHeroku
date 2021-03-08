<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Cars;
use App\Http\Livewire\Bookings;
use App\Http\Livewire\Perhari;
use App\Http\Livewire\Perbulan;
use App\Http\Livewire\Pertahun;
use App\Http\Livewire\Laporankebudayaan;
use App\Http\Livewire\Laporankesekertariatan;
use App\Http\Livewire\Laporanpemasaran;
use App\Http\Livewire\Laporanpariwisata;
use App\Http\Livewire\Pemesanananda;
use App\Http\Livewire\Pengembalian;
use App\Http\Livewire\Semuapesanan; 
use App\Http\Livewire\Emergencys; 
use App\Http\Livewire\Perawatan;
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

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('dashboard', Cars::class)->name('dashboard');
    Route::get('pemesanananda', Pemesanananda::class)->name('pemesanananda');
    Route::get('pengembalian', Pengembalian::class)->name('pengembalian');
    Route::get('semuapesanan', Semuapesanan::class)->name('semuapesanan');
    Route::get('emergency', Emergencys::class)->name('emergency');
});

Route::get('sekdin', Bookings::class)->name('sekdin'); 
Route::get('perawatan', Perawatan::class)->name('perawatan'); 
Route::get('perhari', Perhari::class)->name('perhari'); 
Route::get('perbulan', Perbulan::class)->name('perbulan'); 
Route::get('pertahun', Pertahun::class)->name('pertahun'); 
Route::get('laporankebudayaan', Laporankebudayaan::class)->name('laporankebudayaan'); 
Route::get('laporankesekertariatan', Laporankesekertariatan::class)->name('laporankesekertariatan'); 
Route::get('laporanpariwisata', Laporanpariwisata::class)->name('laporanpariwisata'); 
Route::get('laporanpemasaran', Laporanpemasaran::class)->name('laporanpemasaran'); 
