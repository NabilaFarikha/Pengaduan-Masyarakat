<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pengaduan;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Tanggapan;
use PDF;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $pengaduan = Pengaduan::all();
        return view('pengaduan.index', compact('pengaduan','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        // $pengaduan = Pengaduan::all();
        return view('pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request,[
    		// 'tgl_pengaduan' => Carbon::now()->format('Y-m-d H:i:s'),
            'isi_laporan' => 'required',
            'foto' => 'required',
            // 'status' => 'required'
    	]);
        $nik = Auth::user()->nik;
       
        $imgName = $request->foto->getClientOriginalName() . '-' . time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('image'), $imgName);
        
        Pengaduan::create([
    		// 'tgl_pengaduan' => Carbon::now()->format('Y-m-d'),
            'tgl_pengaduan' => date ('Y-m-d H:i:s'),
    		'nik' =>$nik,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $imgName,
            // 'status' => $request->status
            'status' => '0'
    	]);

        // Pengaduan::create($request->all());
 
    	return redirect('/masyarakat')->with('Data dilaporkan','Data berhasil diinput!');   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::all();
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
        // return view('pengaduan.show', compact('pengaduan','user'));

        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query){
            $query->where('id_pengaduan', request()->route('id'));
        })->with('user')->first();

        return view('pengaduan.show', compact('pengaduan', 'data_tanggapan'))->with('Data ditanggapi','Data berhasil ditanggapi!');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan',$id)->first();
        return view('pengaduan.edit', compact('pengaduan'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           
        $this->validate($request,[
            'tanggapan' => 'required',
    	]);

        Tanggapan::where('id_tanggapan', $id)->update([
            'tanggapan' => $request->tanggapan
        ]);
 
    	return redirect()->back();
    
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengaduan::where('id_pengaduan',$id)->delete();
        return redirect('/pengaduan')->with('Data terhapus','Data berhasil dihapus!');
    }

    // public function status($id)
    // {
    //     $pengaduan = Pengaduan::where('id_pengaduan',$id)->first();

    //     $status_sekarang = $pengaduan->status;

    //     If($status_sekarang == 1){
    //         Pengaduan::where('id_pengaduan',$id)->update([
    //         'status'=>0
    //         ]);
    //     }else{
    //         Pengaduan::where('id_pengaduan',$id)->update([
    //             'status'=>1
    //         ]);
    //     }

    //     return redirect()->route('pengaduan');
    public function statusOnchange($id){    
        $pengaduan = Pengaduan::with('user')->find($id);
        $pengaduan->status = request()->get('status');
        $pengaduan->save();
        return redirect()->back();
    }

    public function pdf(){
        $pengaduan = Pengaduan::with('user')->get();
        $pdf = \PDF::loadView('petugas.cetak',compact('pengaduan'))->setPaper('a4','landscape');
        return $pdf->stream();
    }
}
