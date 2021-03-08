<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Perbulan extends Component
{
    public $data;
    public function render()
    {
        $this->data = DB::table('logs')
        ->select(DB::raw("(DATE_FORMAT(created_at,'%m-%Y')) as tanggal"), 'nama_bidang', DB::raw('SUM(kupon) as kupon'))
        ->groupBy('tanggal','nama_bidang')
        ->orderBy('tanggal', 'desc') 
        ->get();
        return view('livewire.perbulan');
    }
}
