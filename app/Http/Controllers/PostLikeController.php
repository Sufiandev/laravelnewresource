<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
	public function __construct(){
		$this->middleware(['auth']);
	}
    public function store(Post $post,Request $request){
    	if($post->likeByUser($request->user())){
    		return response('true',409);
    	}

    	$post->likes()->create([
    		'user_id' => $request->user()->id
    	]);
    	return back();
    }

    public function destory(Post $post,Request $request){
    	$request->user()->likes()->where('post_id',$post->id)->delete();
    	return back();
    }
}
