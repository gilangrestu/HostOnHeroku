<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Laporanpemasaran extends Component
{
    public $data;
    public function render()
    {
        $this->data = DB::table('logs')
        ->select(DB::raw("(DATE_FORMAT(logs.created_at,'%d-%m-%Y')) as tanggal"), 'logs.id','logs.mobil','logs.kegiatan', 'logs.kupon','logs.img_awal','logs.img_kegiatan','logs.img_akhir')
        ->where('logs.nama_bidang' ,'=', 'Bidang Pemasaran')
        ->get();
        return view('livewire.laporanpemasaran');
    }
}
