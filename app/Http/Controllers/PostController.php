<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
    	$posts=Post::latest()->with(['likes','user'])->paginate('4');
    	return view('posts.index',['posts'=>$posts]);
    }

    public function show(Post $post){
        return view('posts.show',[
            'post'=>$post
        ]);
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'body' => 'required|max:255'
    	]);

    	$request->user()->posts()->create($request->only('body'));
    	return back();

    }

    public function destory(Post $post){
        $this->authorize('deletePost',$post);
        $post->delete();
        return back();
    }
}
