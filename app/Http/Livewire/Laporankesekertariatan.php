<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Laporankesekertariatan extends Component
{
    public $data;
    public function render()
    {
        $this->data = DB::table('logs')
        ->select(DB::raw("(DATE_FORMAT(logs.created_at,'%d-%m-%Y')) as tanggal"), 'logs.id','logs.mobil','logs.kegiatan', 'logs.kupon','logs.img_awal','logs.img_kegiatan','logs.img_akhir')
        ->where('logs.nama_bidang' ,'=', 'Bidang Kesekertariatan')
        ->get();
        return view('livewire.laporankesekertariatan');
    }
}
