<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use App\Tanggapan;
use App\User;
use Auth;


class DashboardController extends Controller
{
    public function index()
    {
        return view('halaman.dashboard',[
            'pengaduan' => Pengaduan::count(),
            'petugas' => User::where('level','=', 'PETUGAS')->count(),
            'tanggapan' => Tanggapan::count(),
            'pending' => Pengaduan::where('status', '0')->count(),
            'proses' => Pengaduan::where('status', 'Proses')->count(),
            'selesai' => Pengaduan::where('status', 'Selesai')->count(),
        ]);
    }

    public function masyarakat()
    {
        return view('halaman.dashboarduser');
    }

    public function laporanku(){
        $pengaduan = Auth()->user()->pengaduan;
        return view('masyarakat.show',compact('pengaduan'));
    }

    public function detailLaporan($id)
    {
        // $pengaduan = Auth()->user()->pengaduan;
        $detail_laporan = Pengaduan::with('user')->find($id);

        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query){
            $query->where('id_pengaduan', request()->route('id'));
        })->with('user')->first();

        return view('masyarakat.detailLaporan',compact('data_tanggapan','detail_laporan'));
    }

    // public function jumlah()
    // {
    //     $jumlah_pengaduan = Pengaduan::all()->count();
    //     $jumlah_tanggapan = Tanggapan::all()->count();

    //     return view('halaman.dashboard')
    //         ->with('jumlah_pengaduan', $jumlah_pengaduan)
    //         ->with('jumlah_tanggapan', $jumlah_tanggapan);
    // }
    

    // public function dashboard(){
    //     return view('halaman.dashboard',[
    //         'pengaduan' => Pengaduan::count(),
    //         'petugas' => User::where('level','=', 'PETUGAS')->count(),
    //         'masyarakat' => User::where('level','=', 'MASYARAKAT')->count(),
    //         'tanggapan' => Tanggapan::count(),
    //         'pending' => Pengaduan::where('status', '0')->count(),
    //         'proses' => Pengaduan::where('status', 'Proses')->count(),
    //         'selesai' => Pengaduan::where('status', 'Selesai')->count(),
    //     ]);
    // }
    
}
