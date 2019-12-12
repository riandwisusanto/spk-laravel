<?php
namespace App\Http\Controllers;
use App\UserModel;
use App\PesertaModel;
use Illuminate\Http\Request;
use PDF;
class DataDsController extends Controller
{
    public function view()
    {
        $data = UserModel::where('jabatan','rt')->get();
        $cek = PesertaModel::where('kirim','ya')->get();
        return view('Data_ds', compact('data', 'cek'));
    }

    public function cetak()
    {
        $data = PesertaModel::where('kirim','ya')->get();
        $pdf = PDF::loadview('load_view', compact('data'));
        return $pdf->download('data_desa_sobontoro','.pdf');
    }
}
