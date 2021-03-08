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

Route::get('VX0G8waF29qPiHoA', Bookings::class)->name('sekdin'); 
Route::get('4r8IM90zslIp3WQU', Perawatan::class)->name('perawatan'); 
Route::get('PxxnUIDDaa2M4UdS', Perhari::class)->name('perhari'); 
Route::get('xNYdxsgFtMEKp4jN', Perbulan::class)->name('perbulan'); 
Route::get('3T91OKxCfjI1uzg5', Pertahun::class)->name('pertahun'); 
Route::get('lUY11RVN73IQuZ5d', Laporankebudayaan::class)->name('laporankebudayaan'); 
Route::get('nqaddtKSWILVyJ1J', Laporankesekertariatan::class)->name('laporankesekertariatan'); 
Route::get('zyXyQNjXVK6cYXic', Laporanpariwisata::class)->name('laporanpariwisata'); 
Route::get('Hcq7UPcqqklB57DC', Laporanpemasaran::class)->name('laporanpemasaran'); 
