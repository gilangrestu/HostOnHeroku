<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = ['id','mobil','tgl_dari','tgl_sampai','nama_bidang','kegiatan','bensin','kupon','img_awal','img_kegiatan','img_akhir'];
}
