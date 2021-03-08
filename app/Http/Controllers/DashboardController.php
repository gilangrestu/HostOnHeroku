<?php

namespace App\Http\Controllers;
use App\Models\Mobil;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $mobil = Mobil::all();
        return view('dashboard')->with('mobil',$mobil);
    }
}
