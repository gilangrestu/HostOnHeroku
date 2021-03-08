<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifPersetujuan;
use App\Models\Notification;

class Bookings extends Component
{
    public $data,$kupon,$pemesanan_id;
    public $isModal = 0;

    public function render()
    {
        $this->data = DB::table('pemesanan')
            ->join('mobil', 'pemesanan.id_mobil', '=', 'mobil.id')
            ->select('pemesanan.id', 'mobil.nama', 'pemesanan.nama_bidang','pemesanan.kegiatan','pemesanan.status_mobil','pemesanan.status_bensin','pemesanan.tgl_dari','pemesanan.tgl_sampai')
            ->where('pemesanan.status_bensin', '!=', 'Disetujui' )
            ->orWhere('pemesanan.status_mobil', '!=', 'Disetujui')
            ->orderBy('pemesanan.created_at', 'desc')
            ->get();
        return view('admin.sekdin');
    }

    public function create()
    {
        //KEMUDIAN DI DALAMNYA KITA MENJALANKAN FUNGSI UNTUK MENGOSONGKAN FIELD
        $this->resetFields();
        //DAN MEMBUKA MODAL
        $this->openModal();
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

    //FUNGSI INI UNTUK ME-RESET FIELD/KOLOM, SESUAIKAN FIELD APA SAJA YANG KAMU MILIKI
    public function resetFields()
    {
        $this->id = '';
    }

    public function store()
    {
        $this->validate([
            'kupon' => 'required|int'
        ]);

        Booking::updateOrCreate(['id' => $this->pemesanan_id], [
              'status_bensin' => 'Disetujui',
              'kupon' => $this->kupon
        ]);

        $data = DB::table('pemesanan')
            ->select('pemesanan.id','pemesanan.id_mobil','pemesanan.kegiatan','pemesanan.nama_bidang','pemesanan.updated_at','users.email','pemesanan.kupon')
            ->join('users', 'pemesanan.nama_bidang', '=', 'users.name')
            ->where('pemesanan.id', '=', $this->pemesanan_id )
            ->get()
            ->toArray();

        foreach($data as $row){
            $tgl = $row->updated_at;
            $email = $row->email;
            $kupon = $row->kupon;
            $nama_bidang = $row->nama_bidang;
        }

        $details = [
            'status_bensin' => 'DISETUJUI',
            'tgl_persetujuan' => $tgl,
            'kupon' => $kupon
        ];

        Notification::Create([
            'data' => 'Pemesanan KUPON bensin anda telah DISETUJUI',
            'nama_bidang' => $nama_bidang
        ]);

        Mail::to($email)->send(new NotifPersetujuan($details));
        $this->closeModal(); //TUTUP MODAL
        $this->resetFields(); //DAN BERSIHKAN FIELD
    }

    public function bensin($id)
    {
        $this->pemesanan_id = $id;
        $this->openModal();
    }

    public function mobil($id)
    {
        Booking::updateOrCreate(['id' => $id], [
              'status_mobil' => 'Disetujui'
        ]);


        $data = DB::table('pemesanan')
            ->select('pemesanan.updated_at','users.email','pemesanan.nama_bidang')
            ->join('users', 'pemesanan.nama_bidang', '=', 'users.name')
            ->where('pemesanan.id', '=', $id )
            ->get()
            ->toArray();

        foreach($data as $row){
            $tgl = $row->updated_at;
            $email = $row->email;
            $nama_bidang = $row->nama_bidang;
        }

        Notification::Create([
            'data' => 'Pemesanan MOBIL anda telah DISETUJUI',
            'nama_bidang' => $nama_bidang
        ]);

        $details = [
            'status_bensin' => 'BELUM Disetujui',
            'tgl_persetujuan' => $tgl
        ];
        Mail::to($email)->send(new NotifPersetujuan($details));
    }
}
