<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth')->except();
        $this->middleware('auth')->only('store', 'destroy');
    }

    public function index(){

        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20); // get() - Collection
        // dd($posts); // or latest()
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);

//        Post::create([
//            'user_id' => auth()->id(),
//            'body' => $request->body,
//        ]);

       // auth()->user()->posts()->create();
//        $request->user()->posts()->create([
//            'body' => $request->body,
//        ]);
        $request->user()->posts()->create($request->only('body'));
        return back();
    }

    public function destroy(Post $post){
        $this->authorize('delete', $post); //PostPolicy
        $post->delete();
        return back();
    }

    public function show(Post $post){
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
