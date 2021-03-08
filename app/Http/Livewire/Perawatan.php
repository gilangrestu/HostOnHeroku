<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Maintance;
use Illuminate\Support\Facades\DB;

class Perawatan extends Component
{
    public $data;
    public function render()
    {
        $this->data = DB::table('maintances')
            ->select('maintances.id_mobil','maintances.status','mobil.nama')
            ->join('mobil', 'maintances.id_mobil', '=', 'mobil.id')
            ->get();
        return view('livewire.perawatan');
    }

    public function perawatan($id_mobil)
    {
        DB::table('maintances')
              ->where('id_mobil', $id_mobil)
              ->update(['status' => 'perawatan']);
    }

    public function selesai($id_mobil)
    {
        DB::table('maintances')
              ->where('id_mobil', $id_mobil)
              ->update(['status' => '-']);
    }
}
