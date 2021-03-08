<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class Semuapesanan extends Component
{
    public $data,$notif;
    public function render()
    {
        $this->data = DB::table('pemesanan')
            ->join('mobil', 'pemesanan.id_mobil', '=', 'mobil.id')
            ->select('pemesanan.id', 'mobil.nama', 'pemesanan.nama_bidang','pemesanan.kegiatan','pemesanan.status_mobil','pemesanan.status_bensin','pemesanan.tgl_dari','pemesanan.tgl_sampai')
            ->orderBy('pemesanan.created_at', 'desc')
            ->get();
        $this->notif = Notification::where('nama_bidang',Auth::user()->name)
            ->get();
        return view('livewire.semuapesanan');
    }
    
    public function hapus_notif($id)
    {
        $data = Notification::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $data->delete(); 
        return redirect('/pemesanananda');
    }
}
