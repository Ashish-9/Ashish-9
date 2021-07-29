<?php

namespace App\Http\Controllers\User;
use App\User;
use App\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $id = Auth::User()->id;
        $users = Post::where('user_id', $id)->paginate(5);
        return view('user.profile')->with('users',$users);;
    }

}
