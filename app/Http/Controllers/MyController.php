<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function login(Request $req){
        if(isset($_SESSION['username'])){
            return view('KaoPiz/PHP/vidu1');
        }
        if($req){
            $username=$req->username;
            $password=$req->password;
            if($username=='duc' && $password=='1234'){
            setcookie('username', $username, time()+100);
            $_SESSION['username']=$username;
            return  view('KaoPiz/PHP/index');
            } else{
                echo "Ban da nhap sai mat khau";
            }
        }
    }
    public function logout(){
        unset($_SESSION['username']);
        return redirect('KaoPiz/PHP/vidu1');
    }
    public function testSwitch(Request $req){
        $key=$req->tienDien;
        if($key<101){
            $dien_trc=$key*450;
            $dien_sau=$dien_trc+$dien_trc*0.1;
            return view('KaoPiz/PHP/index', compact('dien_trc', 'dien_sau'));
        }
        if($key>=101&&$key<201){
            $dien_trc=100*450+($key-100)*600;
            $dien_sau=$dien_trc+$dien_trc*0.1;
            return view('KaoPiz/PHP/index', compact('dien_trc', 'dien_sau'));
        }
        if($key>=201&&$key<301){
            $dien_trc=100*450 +100*600 + ($key-200)*750;
            $dien_sau=$dien_trc+$dien_trc*0.1;
            return view('KaoPiz/PHP/index', compact('dien_trc', 'dien_sau'));
        }
        if($key>=301&&$key<501){
            $dien_trc=100*(450+600+750)+($key-300)*900;
            $dien_sau=$dien_trc+$dien_trc*0.1;
            return view('KaoPiz/PHP/index', compact('dien_trc', 'dien_sau'));
        }
        if($key>=501&&$key<1001){
            $dien_trc=100*(450+600+750+2*900)+($key-500)*1000;
            $dien_sau=$dien_trc+$dien_trc*0.1;
            return view('KaoPiz/PHP/index', compact('dien_trc', 'dien_sau'));
        }
        if($key>=1001){
            $dien_trc=100*(450+600+750+2*900+5*1000)+($key-1000)*1200;
            $dien_sau=$dien_trc+$dien_trc*0.1;
            return view('KaoPiz/PHP/index', compact('dien_trc', 'dien_sau'));
        }

    }
}