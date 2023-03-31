<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserprofilController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        $user_profile = User::where('id', $user->id)->get();
        $provinces = Province::all();
       
        return view('halamandepan.profile', compact('user','provinces','user_profile'));
        $province = Province::all();
        $district = District::all();
        $regency = Regency::all();
        $village = Village::all();
        $user = User::where('id', $id)->first();
        return view('masyarakat.form', compact('user','province','district','regency','village'));
    }

    public function petugas($id)
    {
        $user = Auth::user();
        $user_profile = User::where('id', $user->id)->get();
        $provinces = Province::all();
       
        return view('halamandepan.profile', compact('user','provinces','user_profile'));
        $province = Province::all();
        $district = District::all();
        $regency = Regency::all();
        $village = Village::all();
        $user = User::where('id', $id)->first();
        return view('petugas.profile', compact('user','province','district','regency','village'));
    }

    public function getKota(Request $request)
    {
        $province_id = $request->province_id;
        $regencies = Regency::where('province_id', $province_id)->get();

        $option = "<option>Pilih Kota...</option>";
        foreach ($regencies as $kota ) {
            $option.= "<option value='$kota->id'>$kota->name</option>";  
        }

        echo$option;
    }

    public function getKecamatan(Request $request)
    {
        $regency_id = $request->regency_id;
        $districts = District::where('regency_id', $regency_id)->get();

        $option = "<option>Pilih Kecamatan...</option>";
        foreach ($districts as $kecamatan ) {
            $option.= "<option value='$kecamatan->id'>$kecamatan->name</option>";  
        }

        echo $option;
    }

    public function getKelurahan(Request $request)
    {
        $village_id = $request->village_id;
        $villages = Village::where('district_id', $village_id)->get();

        $option = "<option>Pilih Kelurahan...</option>";
        foreach ($villages as $kelurahan ) {
            $option.= "<option value='$kelurahan->id'>$kelurahan->name</option>";  
        }

        echo $option;
    }


}
