<?php

namespace App\Http\Controllers;
use App\PesertaModel;
use Illuminate\Http\Request;

class DataController extends Controller
{

    public function view($id)
    {
        $data1 = PesertaModel::where(['id_rt' => $id])->orderBy('nilai', 'desc')->get();
        $data = $data1->where('kirim','ya');
        return view('Data', compact('data','id'));
    }

    public function viewdetail($id)
    {
        $data = PesertaModel::find($id);
        return view('Data', compact('data','id'));
    }
}
