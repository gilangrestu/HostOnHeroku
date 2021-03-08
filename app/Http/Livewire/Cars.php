<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Car;
use App\Models\Booking;
use App\Models\Emergency;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifPemesanan;
use App\Models\Notification;
use App\Models\Maintance;

class Cars extends Component
{
    public $cars,$notif,$maintance,$mobilid,$nama,$namabidang,$tglpinjamdari,$tglpinjamsampai,$kegiatan,$bensin,$now,$data;
    public $isModal = 0;
    public $ModalPemesanan = 0;
    public function render()
    {
        //$this->cars = Car::all();
        $this->cars = DB::table('mobil')
            ->select('mobil.id','mobil.nama','mobil.gambar','maintances.id_mobil','maintances.status')
            ->join('maintances', 'mobil.id', '=', 'maintances.id_mobil')
            ->get();
        $this->notif = Notification::where('nama_bidang',Auth::user()->name)->get();
        return view('dashboard');
    }

    public function create()
    {
        $this->resetFields();
        $this->openModal();
        $this->openModalData();
    }

    public function closeModal()
    {
        $this->isModal = false;
        $this->ModalPemesanan = false;
    }

    public function openModal()
    {
        $this->isModal = true;
    }

    public function openModalData()
    {
        $this->ModalPemesanan = true;
    }

    public function resetFields()
    {
        $this->id = '';
    }

    public function store()
    {
        //MEMBUAT VALIDASI
        $this->validate([
            'nama' => 'required|string',
            'tglpinjamdari' => 'required|date',
            'tglpinjamsampai' => 'required|date',
            'kegiatan' => 'required|string',
            'bensin' => 'required'
        ]);

        if($this->bensin == 'kesekretariatan'){
            Mail::to("grestu12@gmail.com")->send(new NotifPemesanan);
            Booking::Create([
                'id_mobil' => $this->mobilid,
                'nama_bidang' => $this->namabidang,
                'tgl_dari' => $this->tglpinjamdari,
                'tgl_sampai' => $this->tglpinjamsampai,
                'kegiatan' => $this->kegiatan,
                'bensin' => $this->bensin,
                'status_bensin' => 'Belum Disetujui'
            ]);
        }else{
            Booking::Create([
                'id_mobil' => $this->mobilid,
                'nama_bidang' => $this->namabidang,
                'tgl_dari' => $this->tglpinjamdari,
                'tgl_sampai' => $this->tglpinjamsampai,
                'kegiatan' => $this->kegiatan,
                'bensin' => $this->bensin
            ]);
        }

        //BUAT FLASH SESSION UNTUK MENAMPILKAN ALERT NOTIFIKASI
        session()->flash('message',' Berhasil ditambahkan');
        $this->closeModal(); //TUTUP MODAL
        $this->resetFields(); //DAN BERSIHKAN FIELD
    }

    public function edit($id)
    {
        $cars = Car::find($id);
        $this->mobilid = $id;
        $this->nama = $cars->nama;
        $this->namabidang = Auth::user()->name;
        $this->openModal(); //LALU BUKA MODAL
    }

    public function lihat($id)
    {
        $this->data = DB::table('pemesanan')
            ->select('pemesanan.nama_bidang','pemesanan.kegiatan','pemesanan.tgl_dari','pemesanan.tgl_sampai')
            ->where('pemesanan.status_mobil','=','Disetujui')
            ->where('pemesanan.id_mobil','=',$id)
            ->orderBy('pemesanan.tgl_dari', 'desc')
            ->get();
        $this->openModalData(); //LALU BUKA MODAL
    }

    public function delete($id)
    {
        $member = Car::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $member->delete(); //LALU HAPUS DATA
        session()->flash('message', $member->name . ' Dihapus'); //DAN BUAT FLASH MESSAGE UNTUK NOTIFIKASI
    }

    public function emergency($id)
    {
        $cars = Car::find($id);
        Emergency::Create([
            'nama_bidang' => Auth::user()->name,
            'mobil' => $cars->nama
        ]); 
    }

    public function hapus_notif($id)
    {
        $data = Notification::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $data->delete(); 
        return redirect('/pemesanananda');
    }

    public function hapus_all()
    {
        $data = Notification::where('nama_bidang', Auth::user()->name);
        $data->delete(); 
    }
}
