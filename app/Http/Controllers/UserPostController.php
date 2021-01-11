<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user){
        //dd($user);
       //$posts = Post::where('user_id', $user->id)->get();
        $posts = $user->posts()->with(['user', 'likes'])->paginate(20);
        return view('users.posts.index', [
           'posts' => $posts,
            'user' => $user,
        ]);
    }
}
