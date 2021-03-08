<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use App\Models\Notification;

class Pengembalian extends Component
{
    public $data,$notif,$img_awal,$img_kegiatan,$img_akhir;
    public function render()
    {
        $this->data = DB::table('pemesanan')
            ->join('mobil', 'pemesanan.id_mobil', '=', 'mobil.id')
            ->select('pemesanan.id', 'mobil.nama', 'pemesanan.nama_bidang','pemesanan.kegiatan','pemesanan.bensin','pemesanan.tgl_dari','img_awal','img_kegiatan','img_akhir','pemesanan.tgl_sampai','pemesanan.kupon')
            ->where('pemesanan.nama_bidang','=',Auth::user()->name)
            ->Where('pemesanan.status_mobil', '=', 'Disetujui')
            ->orderBy('pemesanan.created_at', 'desc')
            ->get();
        $this->notif = Notification::where('nama_bidang',Auth::user()->name)
            ->get();
        return view('livewire.pengembalian');
    }

    public function selesai($id,$nama_bidang,$mobil,$kegiatan,$tgl_dari,$tgl_sampai,$bensin,$kupon,$img_awal,$img_kegiatan,$img_akhir)
    {
        $simpan = Log::create([
            'nama_bidang' => $nama_bidang,
            'mobil' => $mobil,
            'kegiatan' => $kegiatan,
            'tgl_dari' => $tgl_dari,
            'tgl_sampai' => $tgl_sampai,
            'bensin' => $bensin,
            'kupon' => $kupon,
            'img_awal' => $img_awal,
            'img_kegiatan' => $img_kegiatan,
            'img_akhir' => $img_akhir
        ]);
        
        if($simpan){
            $hapus = Booking::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
            $hapus->delete();
        }
    }

    use WithFileUploads;
    public function img_awal($id,$tgl)
    {
        $imageHashName = $this->img_awal->hashName();

        $this->validate([
            'img_awal' => 'required'
        ]);

        $manager = new ImageManager();

        if (!file_exists(public_path('storage/'.$tgl))) {
            mkdir(public_path('storage/'.$tgl), 777, true);
        }

        $img = $manager->make($this->img_awal->path());
        $img->resize(310, 310, function ($const) {
            $const->aspectRatio();
        })->save('storage/'.$tgl.'/'.$imageHashName);
        
        $img_awal = $tgl.'/'.$imageHashName;
        Booking::updateOrCreate(['id' => $id], [
            'img_awal' => $img_awal
        ]);
    }
    
    public function img_kegiatan($id,$tgl)
    {
        $imageHashName = $this->img_kegiatan->hashName();

        $this->validate([
            'img_kegiatan' => 'required'
        ]);

        $manager = new ImageManager();
        
        if (!file_exists(public_path('storage/'.$tgl))) {
            mkdir(public_path('storage/'.$tgl), 777, true);
        }

        $img = $manager->make($this->img_kegiatan->path());
        $img->resize(310, 310, function ($const) {
            $const->aspectRatio();
        })->save('storage/'.$tgl.'/'.$imageHashName);
        
        $img_kegiatan = $tgl.'/'.$imageHashName;
        Booking::updateOrCreate(['id' => $id], [
            'img_kegiatan' => $img_kegiatan
        ]);
    }

    public function img_akhir($id,$tgl)
    {
        $imageHashName = $this->img_akhir->hashName();

        $this->validate([
            'img_akhir' => 'required'
        ]);

        $manager = new ImageManager();

        if (!file_exists(public_path('storage/'.$tgl))) {
            mkdir(public_path('storage/'.$tgl), 777, true);
        }
        
        $img = $manager->make($this->img_akhir->path());
        $img->resize(310, 310, function ($const) {
            $const->aspectRatio();
        })->save('storage/'.$tgl.'/'.$imageHashName);
        
        $img_akhir = $tgl.'/'.$imageHashName;
        Booking::updateOrCreate(['id' => $id], [
            'img_akhir' => $img_akhir
        ]);
    }

    public function hapus_notif($id)
    {
        $data = Notification::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $data->delete(); 
        return redirect('/pemesanananda');
    }
}
