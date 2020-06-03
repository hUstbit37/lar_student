<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PostRequest;
use App\Http\Requests\loginRequest;
use App\Http\Requests\registerRequest;
use App\Post;
use App\User;
use Session;
use DB;
use Auth;
class KaoPizController extends Controller
{
    //List post
    public function index(){
        // dd(Auth::user());
        $list_blog=Post::paginate(4);
        return view('KaoPiz/Laravel/home', compact('list_blog'));
    }
    //login
    public function getLogin(loginRequest $request){
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            Session::flash('success', 'Login success!');
                return redirect('home');
            } else {
                Session::flash('error', 'user hoặc mật khẩu không đúng!');
                return redirect('login');
            }
    }
    //register
    public function getRegister(registerRequest $request){
        $register=User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ]);
        if($register){
            // Session::flash('success', 'Đã tạo mới post thành công');
            $request->session()->flash('success', 'Đã tạo mới user thành công');
            return redirect('register');
        }else{
            Session::flash('error', 'Tạo mới user thất bại');
            return redirect('register');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('home');
    }
    //View create new post
    public function create(){
        return view('KaoPiz/Laravel/blog/create-post');
    }
    public function store(PostRequest $request){
        $create=Post::create($request->all());
        if($create){
            // Session::flash('success', 'Đã tạo mới post thành công');
            $request->session()->flash('success', 'Đã tạo mới post thành công');
            return redirect('create');
        }else{
            Session::flash('error', 'Tạo mới thất bại');
            return redirect('create');
        }
    }
    public function viewUpdate($id){
        // $post_update=DB::table('posts')->where('id', $id)->first();
        $post_update=Post::find($id);
        // dd($post_update);
        return view('KaoPiz/Laravel/blog/post-update', compact('post_update'));
    }
    public function update(PostRequest $request, $id){
        $post_update=Post::find($id)->update($request->all());
        if($post_update){
            $request->session()->flash('success', 'Post updated sucessfully');
            return redirect('view-update/'.$id);
        } else{
            $request->session()->flash('error', 'Post updated failed');
            return redirect('view-update/'.$id);
        }
        
    }
    //Post Detail
    public function getPost($id){
        // $post_detail=Post::where('id', $id)->with('comment')->first();
        $post_detail=Post::with('comment')->find($id);
        // dd($post_detail);
        return view ('KaoPiz/Laravel/blog/post-detail', compact('post_detail'));
    }
    public function delete($id){
        $delete=Post::find($id)->delete();
        if($delete){
            Session::flash('success', 'Post deleted sucessfully');
            return redirect('home');
        } else{
            Session::flash('error', 'Post deleted failed');
            return redirect('home');
        }
    }
    //Search
    public function search(Request $rq)
    {
        $namerq=$rq->search;
        $list_blog=DB::table('posts')->where('title', 'like', '%'.$namerq.'%')->orderBy('id', 'desc')->paginate(4);
        // dd($list_blog);
        return view('KaoPiz/Laravel/home',compact('list_blog'));
    }
}