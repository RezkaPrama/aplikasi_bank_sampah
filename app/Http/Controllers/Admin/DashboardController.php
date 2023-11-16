<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisSampah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $jenis_sampah = JenisSampah::count();

        return view('admin.dashboard.index', compact('jenis_sampah'));
    }
}
