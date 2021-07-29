<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Post;

class RegisteredController extends Controller
{
    public function index(){
        $users = User::where('role', NULL)->paginate(3);
        return view('admin.users.index')->with('users',$users);
    }

    public function edit($id)
    {
        $user_edit = User::find($id);
        return view('admin.users.edit')->with('user_edit', $user_edit);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->update();
        return redirect()->back()->with('status','Data updated!');
    }

    public function create()
    {
        return view('admin.users.create');
    }


    protected function store(UserCreateRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('status','User Registered Successfully!');
    }

    public function destroy($id){
        User::destroy($id);
        return redirect()->back()->with('status','User Deleted Successfully!');
    }

    public function view($id){
        $users = Post::where('user_id', $id)->paginate(5);
        return view('admin.users.uploads')->with('users',$users);
    }

    public function postdestroy($id){
        Post::destroy($id);
        return redirect()->back()->with('status','Data Deleted Successfully!');
    }
 }



