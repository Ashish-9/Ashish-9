<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function create(Request $request){

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->desc = $request->desc;
        $post->lat = $request->lat;
        $post->longi = $request->longi;
        $post->area = $request->area;
        $post->district = $request->district;
        $post->circle = $request->circle;

        //check if post has photo
        if($request->photo != ''){
            //choose a unique name for photo
            $photo = time().'.jpg';
            file_put_contents('storage/posts/'.$photo,base64_decode($request->photo));
            $post->photo = $photo;
        }

        $post->save();
         $post->user;
        return response()->json([
            'success' => true,
            'message' => 'posted',
            'post' => $post
        ]);
    }
    public function myposts(){
        $posts = Post::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'posts' => $posts,
            'user' => $user
        ]);
    }
    public function my_posts(){
        $posts = Post::all();
        return response()->json([
            'success' => true,
            'posts' => $posts,
            // 'user' => $user
        ]);
    }
}

