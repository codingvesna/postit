<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('posts.index');
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
        $request->user()->posts()->create([
            'body' => $request->body,
        ]);

        return back();
    }
}
