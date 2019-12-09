<?php

namespace App\Http\Controllers;
use App\PesertaModel;
use App\ComboModel;
use App\UserModel;
use DB;
use Illuminate\Http\Request;

class InputDataController extends Controller
{   
    public function view($id)
    {
        $combo = ComboModel::all();
        $nama = UserModel::find($id)->nama;
        return view('inputdata_rt', compact('combo', 'id', 'nama'));
    }

    public function tambah($id, Request $req)
    {
        $req->validate([
            'nama' => 'required',
            'no_ktp' => 'required|numeric||min:16|max:16',
            'alamat' => 'required'
        ]);

        $pendaftar = new PesertaModel;

        $pendaftar->id_rt = $id;
        $pendaftar->nama = $req->nama;
        $pendaftar->no_ktp = $req->no_ktp;
        $pendaftar->pekerjaan = $req->pekerjaan;
        $pendaftar->pendapatan = $req->pp;
        $pendaftar->jumlah_tanggungan = $req->jt;
        $pendaftar->rumah = $req->kr;
        $pendaftar->pendidikan = $req->pend;
        $pendaftar->alamat = $req->alamat;

        $pendaftar->save();

        $nama = UserModel::find($id)->nama;

        return redirect()->route('tambah.index', compact('id', 'nama'))->withInfo('Data Telah Berhasil Terekam');
    }

    public function Detil($idd)
    {
        $detil = PesertaModel::find($idd);
        $id = $detil->id_rt;
        $nama = UserModel::find($id)->nama;
        return view('detil_rt', compact('detil', 'id', 'nama'));
    }
    public function Ubah($idd, Request $req)
    {
        $req->validate([
            'nama' => 'required',
            'no_ktp' => 'required|numeric',
            
        ]);

        $pendaftar = PesertaModel::findOrFail($idd);
        $id = $pendaftar->id_rt;

        $pendaftar->nama = $req->nama;
        $pendaftar->no_ktp = $req->no_ktp;
        $pendaftar->pekerjaan = $req->pekerjaan;
        $pendaftar->pendapatan = $req->pp;
        $pendaftar->jumlah_tanggungan = $req->jt;
        $pendaftar->rumah = $req->kr;
        $pendaftar->pendidikan = $req->pend;
        $pendaftar->alamat = $req->alamat;

        $pendaftar->save();

        return redirect()->route('data.rt', compact('id'))->withInfo('Data Telah Berhasil di Ubah');
    }

    public function hapus($id)
    {
        $hapus = PesertaModel::find($id);
        $hapus->delete();
        $nama = UserModel::find($id)->nama;
        return redirect()->route('data.rt',compact('id', 'nama'))->withInfo('Data Telah Berhasil di Hapus');
    }
}
