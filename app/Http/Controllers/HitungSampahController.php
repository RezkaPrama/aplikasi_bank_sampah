<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use Illuminate\Http\Request;

class HitungSampahController extends Controller
{
    public function index()
    {
        $jenisSampah = JenisSampah::all(); 
        return view('user.front', compact('jenisSampah'));
    }

    public function calculate(Request $request)
    {
        $jenisSampah = JenisSampah::find($request->jenis_sampah)->nama;
        $hargaPerKg = JenisSampah::find($request->jenis_sampah)->harga_per_kg;
        $jumlahSampah = $request->jumlah_sampah;
        $totalHarga = $hargaPerKg * $jumlahSampah;

        return view('user.dashboard', compact('totalHarga', 'jumlahSampah', 'hargaPerKg','jenisSampah'));
    }
}
