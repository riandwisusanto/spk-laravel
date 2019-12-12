<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;

class InputRtController extends Controller
{
    public function index()
    {
        return view('input_rt');
    }

    public function tambah(Request $req)
    {
        $req->validate([
            'nama' => 'required',
            'dari_rt' => 'required',
            'no_ktp' => 'required|numeric|min:16',
            'alamat' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $cekk = $req->dari_rt;
        $cek = UserModel::find($cekk);
        if($cek === $cekk){
            return redirect()->route('tambah.rt')->withInfo('RT ini telah terdaftar');
        }
        else{
            $req->validate([
                'nama' => 'required',
                'dari_rt' => 'required',
                'no_ktp' => 'required|numeric|min:16',
                'alamat' => 'required',
                'username' => 'required',
                'password' => 'required'

            ]);

            $user = new UserModel;

            $user->nama = $req->nama;
            $user->dari_rt = $req->dari_rt;
            $user->no_ktp = $req->no_ktp;
            $user->alamat = $req->alamat;
            $user->username = $req->username;
            $user->password = $req->password;
            $user->jabatan = 'rt';

            $user->save();

            return redirect()->route('tambah.rt')->withInfo('Data Telah Berhasil Terekam');
        }
    }

    public function Detil($id)
    {
        $detil = UserModel::find($id);

        return view('detil_user_rt', compact('detil'));
    }
    public function Ubah($id, Request $req)
    {
        $req->validate([
            'nama' => 'required',
                'dari_rt' => 'required',
                'no_ktp' => 'required|numeric|min:16',
                'alamat' => 'required',
                'username' => 'required',
                'password' => 'required'
            
        ]);

        $user = UserModel::findOrFail($id);

        $user->nama = $req->nama;
        $user->dari_rt = $req->dari_rt;
        $user->no_ktp = $req->no_ktp;
        $user->alamat = $req->alamat;
        $user->username = $req->username;
        $user->password = $req->password;

        $user->save();

        echo "<script>alert('Data telah berhasil diubah')</script>";
        return redirect()->route('ds.data');
    }

    public function hapus($id)
    {
        $data = UserModel::find($id);
        $data->delete();
        
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        return redirect()->route('ds.data');
    }
}
