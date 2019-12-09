<?php

namespace App\Http\Controllers;
use App\UserModel;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index($id)
    {
    	$nama = UserModel::find($id)->nama;
    	return view('tentang', compact('id', 'nama'));
    }

    public function index1()
    {
    	return view('tentang_ds');
    }
}
