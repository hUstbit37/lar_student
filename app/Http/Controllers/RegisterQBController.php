<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\RegisterQb;
use Auth;

class RegisterQBController extends Controller
{
    public function registerQb()
    {
        return view('registerQb');
    }
    //Lay data tu form insert vao bang
    public function getRegisterQb(Request $req)
    {
        $req->validate([
            'username'=>'required|unique:member',
            'password'=>'required|min:8|max:30',
            'password_confirm'=>'required|same:password',
            'email'=>'required|unique:member'
        ],[
            'username.unique'=>'Username đã tồn tại',
            'username.required'=>'Username không để trống',
            'email.required'=>'Email không để trống',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Password không để trống',
            'password.min'=>'Password ít nhất 8 ký tự',
            'password.max'=>'Password tối đa 30 ký tự ',
            'password_confirm.required'=>'Password confirm không để trống',
            'password_confirm.same'=>'Password nhập lại không trùng khớp',

        ]);
        $username = $req -> username;
        // $password = ($req -> password);
        $password = bcrypt($req -> password);
        $email = $req -> email;
    
        //Insert dữ liệu bằng Query Builder
        DB::table('member')->insert([
            'username'=>$username,
            'email'=>$email,
            'password'=>$password
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
        foreach ($allMember as $value)
        {
            echo $value['username'].'<br>';
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
            'username'=>'required',
            'password'=>'required|min:8|max:30'
        ],[
            'username.required'=>'Username không để trống',
            'password.required'=>'Password không để trống',
            'password.min'=>'Password ít nhất 8 ký tự',
            'password.max'=>'Password tối đa 30 ký tự ',
        ]);

        $username['info'] = $req->username;
        $password = ($req->password);
        //echo $username;

        // $result = DB::table('member')->where('username', $username)->get()->toArray();
        // //dd($result);
        // foreach ($result as $value){

        // }
        // if ($value->password == $password)
        // {
        //     return view ('test', ['user'=>$username]);
        // }
        // else
        // {
        //     echo 'Login failed';
        // }

        //
        $remember = $req->has('remember') ? true : false;
        if(Auth::attempt(['username'=>$username, 'password'=>$password], $remember))
        {
            return view('test',$username);
        }
        else
        {
            echo 'Login failed';
        }
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
        return redirect ('loginQb');
    }
}