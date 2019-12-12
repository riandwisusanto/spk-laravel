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

        if($usernm){
            if($usernm->password == $req->password){
                if($usernm->jabatan == 'rt'){
                    return redirect()->route('data.rt', $usernm->id );
                }
                else{
                    return redirect()->route('ds.data');
                }
            }
            else{
                echo "<script>alert('Password salah')</script>";
                return view('home');
            }
        }
        else{
            echo "<script>alert('Username salah')</script>";
            return view('home');
        }
    }
}
