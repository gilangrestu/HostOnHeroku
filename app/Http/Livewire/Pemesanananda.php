<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Notification;

class Pemesanananda extends Component
{
    public $data,$notif,$kupon,$tgl,$bidang;
    public $isModal = 0;
    public function render()
    {
        $this->data = DB::table('pemesanan')
            ->join('mobil', 'pemesanan.id_mobil', '=', 'mobil.id')
            ->select('pemesanan.id', 'mobil.nama', 'pemesanan.nama_bidang','pemesanan.kegiatan','pemesanan.status_mobil','pemesanan.status_bensin','pemesanan.tgl_dari','pemesanan.tgl_sampai','pemesanan.kupon','pemesanan.updated_at')
            ->where('pemesanan.nama_bidang','=',Auth::user()->name)
            ->orderBy('pemesanan.created_at', 'desc')
            ->get();
        $this->notif = Notification::where('nama_bidang',Auth::user()->name)
            ->get();
        return view('livewire.pemesanananda');
    }

    public function closeModal()
    {
         $this->isModal = false;
    }

    //FUNGSI INI DIGUNAKAN UNTUK MEMBUKA MODAL
    public function openModal()
    {
        $this->isModal = true;
    }

    public function kupon($kupon,$tgl,$bidang)
    {
        $this->kupon = $kupon;
        $this->tgl = $tgl;
        $this->bidang = $bidang;
        $this->openModal();
    }

    public function batal($id)
    {
        $hapus = Booking::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $hapus->delete();
    }

    public function hapus_notif($id)
    {
        $data = Notification::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $data->delete(); 
        return redirect('/pemesanananda');
    }
}
