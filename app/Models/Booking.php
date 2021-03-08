<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $fillable = ['id_mobil','tgl_dari','tgl_sampai','nama_bidang','kegiatan','bensin','img_awal','img_kegiatan','img_akhir','kupon','status_bensin','status_mobil'];
}
