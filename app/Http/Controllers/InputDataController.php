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
            'no_ktp' => 'required|numeric||min:16',
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
        $pendaftar->status = "Tidak Direkomendasikan";

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
            'no_ktp' => 'required|numeric||min:16',
            'alamat' => 'required'
            
        ]);

        $daftar = PesertaModel::find($idd);
        $id = $daftar->id_rt;

        $daftar->id = $idd;
        $daftar->id_rt = $id;
        $daftar->nama = $req->nama;
        $daftar->no_ktp = $req->no_ktp;
        $daftar->pekerjaan = $req->pekerjaan;
        $daftar->pendapatan = $req->pp;
        $daftar->jumlah_tanggungan = $req->jt;
        $daftar->rumah = $req->kr;
        $daftar->pendidikan = $req->pend;
        $daftar->alamat = $req->alamat;
        $daftar->status = "Tidak Direkomendasikan";

        $daftar->save();
        return redirect()->route('data.rt', compact('id'))->withInfo('Data Telah Berhasil Diubah');
    }

    public function hapus($id)
    {
        $hapus = PesertaModel::find($id);
        $idd = $hapus->id_rt;
        $hapus->delete();
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        return redirect()->route('data.rt',compact('idd'))->withInfo('Data Telah Berhasil Dihapus');
    }
}
