<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\RegisterQb;
use Auth;
use DB;
use Illuminate\Http\Request;

class RegisterQBController extends Controller
{
    public function registerQb()
    {
        return view('registerQb');
    }
    //Lay data tu form insert vao bang
    public function getRegisterQb(registerRequest $req)
    {
        // $req->validate([
        //     'username'=>'bail|required|alpha|unique:member',
        //     'password'=>'required|min:8|max:30',
        //     'password_confirm'=>'required|same:password',
        //     'email'=>'required|unique:member'
        // ],[
        //     'username.unique'=>'Username đã tồn tại',
        //     'username.required'=>'Username không để trống',
        //     'username.alpha'=>'Username chỉ chứa các chữ cái',
        //     'email.required'=>'Email không để trống',
        //     'email.unique'=>'Email đã tồn tại',
        //     'password.required'=>'Password không để trống',
        //     'password.min'=>'Password ít nhất 8 ký tự',
        //     'password.max'=>'Password tối đa 30 ký tự ',
        //     'password_confirm.required'=>'Password confirm không để trống',
        //     'password_confirm.same'=>'Password nhập lại không trùng khớp',
        // ]);
        $username = $req->username;
        $password = bcrypt($req->password);
        $email = $req->email;

        //Insert dữ liệu bằng Query Builder
        DB::table('member')->insert([
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ]);
        echo 'Added member';

        //insert bang Model
        // $mem = new RegisterQb;
        // $mem -> username = $username;
        // $mem -> password = $password;
        // $mem -> email = $email;
        // $mem -> save();
        // echo 'Done';

    }
    //Get infor member
    public function getMember()
    {
        $allMember = RegisterQb::all()->toArray();
        foreach ($allMember as $value) {
            echo $value['username'] . '<br>';
        }
        //dd($allMember);
    }
    //Serch member by id
    public function findID($id)
    {
        $membyID = RegisterQb::find($id)->toArray();
        //var_dump($membyID);
        echo $membyID['username'];
    }
    public function getLoginQb(Request $req)
    {
        $req->validate([
            'username' => 'bail|required|alpha',
            'password' => 'required|min:8|max:30',
        ], [
            'username.required' => 'Username không để trống',
            'username.alpha' => 'Username chỉ chứa các chữ cái',
            'password.required' => 'Password không để trống',
            'password.min' => 'Password ít nhất 8 ký tự',
            'password.max' => 'Password tối đa 30 ký tự ',
        ]);
        // $validator = Validator::make($req->all());

        dd($s);
        $username['info'] = $req->username;
        $password = ($req->password);

        echo '2';

        //
        // $remember = $req->has('remember') ? true : false;
        // if (Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
        //     return view('test', $username);
        // } else {
        //     Session::flash('error', 'Email hoặc mật khẩu không đúng!');
        //     return view('loginQb');
        // }
    }

    // public function checkTest()
    // {
    //     if(Auth::check())
    //     {
    //         $username= Auth::member()->username;
    //         dd($username);
    //         return view('test', ['user'=>$username]);
    //     }
    //     else
    //     {
    //         return view ('loginQb');
    //     }
    // }

    public function logoutQb()
    {
        Auth::logout();
        return redirect('loginQb');
    }
}
