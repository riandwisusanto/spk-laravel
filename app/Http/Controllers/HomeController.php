<?php
namespace App\Http\Controllers;
use App\UserModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function view()
    {
        $usernm = UserModel::where(['username' => 'riandwi'])->first();
        return view('home', compact('usernm'));
    }

    public function masuk(Request $req)
    {
        $usernm = UserModel::where(['username' => $req->nama])->first();
        $username = $usernm->username;
        $password = $usernm->password;
        $id=$usernm->id;
        if($usernm->username == $req->nama && $usernm->password == $req->password){
            if($usernm->jabatan == 'rt'){
                return redirect()->route('data.rt', $usernm->id );
            }
            else{
                return redirect()->route('ds.data');
            }
            return view('datart');
        }
        else{
            return redirect('/')->with('Login Gagal');
        }
    }
}
