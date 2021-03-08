<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Emergency;
use App\Models\Log;
use App\Models\Notification;

class Emergencys extends Component
{
    public $id_emergency,$data,$notif,$nama,$namabidang,$tgl,$kegiatan,$bensin;
    public $isModal = 0;
    public function render()
    {
        $this->data = Emergency::where('nama_bidang',Auth::user()->name)
                                ->get();
        $this->notif = Notification::where('nama_bidang',Auth::user()->name)
                                ->get();
        return view('livewire.emergency');
    }
    //FUNGSI INI UNTUK MENUTUP MODAL DIMANA VARIABLE ISMODAL KITA SET JADI FALSE
    public function closeModal()
    {
         $this->isModal = false;
    }

    //FUNGSI INI DIGUNAKAN UNTUK MEMBUKA MODAL
    public function openModal()
    {
        $this->isModal = true;
    }

    public function resetFields()
    {
        $this->id = '';
    }

    public function aksi($id_emergency)
    {
        $data = Emergency::find($id_emergency);
        $this->id_emergency = $id_emergency;
        $this->nama = $data->mobil;
        $this->namabidang = $data->nama_bidang;
        $this->tgl = $data->created_at->format('Y-m-d');
        $this->openModal(); //LALU BUKA MODAL
    }

    public function store()
    {
        //MEMBUAT VALIDASI
        $this->validate([
            'nama' => 'required|string',
            'kegiatan' => 'required|string',
            'bensin' => 'required'
        ]);

        $simpan = Log::Create([
            'nama_bidang' => $this->namabidang,
            'mobil' => $this->nama,
            'tgl_dari' => $this->tgl,
            'kegiatan' => $this->kegiatan,
            'bensin' => $this->bensin,
        ]);

        if($simpan){
            $data = Emergency::find($this->id_emergency); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
            $data->delete(); 
        }

        //BUAT FLASH SESSION UNTUK MENAMPILKAN ALERT NOTIFIKASI
        session()->flash('message',' Berhasil ditambahkan');
        $this->closeModal(); //TUTUP MODAL
        $this->resetFields(); //DAN BERSIHKAN FIELD
    }
    public function hapus_notif($id)
    {
        $data = Notification::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $data->delete(); 
        return redirect('/pemesanananda');
    }
}
