<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Post;
use App\User;
use App\Role;
use App\Phone;

class KaoPizController extends Controller
{
    //Exercise past Query Builder

    //List post
    public function index()
    {
        $list_blog = Post::paginate(4);
        return view('KaoPiz/Laravel/home', compact('list_blog'));
    }
    //login
    public function login()
    {
        return view('KaoPiz/Laravel/auth/login');
    }
    public function getLogin(LoginRequest $request)
    {
        if (Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
            Session::flash('success', 'Login success!');
            return redirect('home');
        } else {
            Session::flash('error', 'user hoặc mật khẩu không đúng!');
            return redirect('login');
        }
    }
    //register
    public function register()
    {
        return view('KaoPiz/Laravel/auth/register');
    }
    public function getRegister(RegisterRequest $request)
    {
        $register = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if ($register) {
            // Session::flash('success', 'Đã tạo mới post thành công');
            $request->session()->flash('success', 'Đã tạo mới user thành công');
            return redirect('register');
        } else {
            Session::flash('error', 'Tạo mới user thất bại');
            return redirect('register');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
    //View create new post
    public function create()
    {
        return view('KaoPiz/Laravel/blog/create-post');
    }
    public function store(PostRequest $request)
    {
        $create = Post::create($request->all());
        if ($create) {
            // Session::flash('success', 'Đã tạo mới post thành công');
            $request->session()->flash('success', 'Đã tạo mới post thành công');
            return redirect('create');
        } else {
            Session::flash('error', 'Tạo mới thất bại');
            return redirect('create');
        }
    }
    public function viewUpdate($id)
    {
        // $post_update=DB::table('posts')->where('id', $id)->first();
        $post_update = Post::find($id);
        return view('KaoPiz/Laravel/blog/post-update', compact('post_update'));
    }
    public function update(PostRequest $request, $id)
    {
        $post_update = Post::find($id)->update($request->all());
        if ($post_update) {
            $request->session()->flash('success', 'Post updated sucessfully');
            return redirect('view-update/' . $id);
        } else {
            $request->session()->flash('error', 'Post updated failed');
            return redirect('view-update/' . $id);
        }
    }
    //Post Detail
    public function getPost($id)
    {
        // $post_detail=Post::where('id', $id)->with('comment')->first();
        $post_detail = Post::with('comment')->find($id);
        // dd($post_detail);
        return view('KaoPiz/Laravel/blog/post-detail', compact('post_detail'));
    }
    public function delete($id)
    {
        $delete = Post::find($id)->delete();
        if ($delete) {
            Session::flash('success', 'Post deleted sucessfully');
            return redirect('home');
        } else {
            Session::flash('error', 'Post deleted failed');
            return redirect('home');
        }
    }
    //Search
    public function search(Request $rq)
    {
        $namerq = $rq->search;
        $list_blog = Post::with('comment')->where('title', 'like', '%' . $namerq . '%')->orderBy('id', 'desc')->paginate(4);
        // dd($list_blog);
        return view('KaoPiz/Laravel/home', compact('list_blog'));
    }


    //Exercise past Eloquen ORM
    public function searchExercise1(Request $request)
    {

        $users = User::select('*');
        // dd($users);
        if ($request->id) {
            $users->where('id', $request->id);
        }
        if ($request->name) {
            $users->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->email) {
            $users->where('email', 'like', '%' . $request->email . '%');
        }
        $result = $users->orderBy('id', 'desc')->get();
        return view('KaoPiz/ExerciseORM/exercise_1', compact('result'));
    }
    public function searchExercise2(Request $request, User $users)
    {
        //id, phone, role_name
        // $users = User::query();
        if ($request->user_id) {
            $users->find($request->user_id);
            // dd($users->get());
        }
        if ($request->phone) {

            $users->with(['phone' => function ($phone) use ($request) {
                $phone->where('phone', 'like', $request->phone);
            }]);
            dd($users->get());
        }
        if ($request->role_name) {
            $users->with(['roles' => function ($role) use ($request) {
                $role->where('name', 'like', $request->role_name);
            }]);
            dd($users->get()->toArray());
            // $a = Role::where('name', $request->role_name)->with('users')->get();
        }
        dd($users->get()->toArray());
    }
}
