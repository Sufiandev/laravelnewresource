@extends('layouts.app')
@section('content')
 <div class="flex justify-center">
 	<div class="w-8/12 bg-white p-6 rounded-lg">
		<div class="mb-4">
			<a href="{{ route('users.posts',$post->user) }}" class="font-bold">{{$post->user->name}}</a>
			<span class="text-grey-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
			<p class="mb-2">{{$post->body}}</p>
		    <div class="mb-1">
		        @can('deletePost',$post)
		            <form class="mr-1" action="{{route('posts.destory',$post)}}" method="post">
		                    @csrf
		                    @method('DELETE')
		                    <button type="submit">delete</button>
		            </form>
		        @endcan
		        
		    </div>
			<div class="">
		        @if(!$post->likeByUser(auth()->user()))
					<form class="mr-1" action="{{route('posts.likes',$post)}}" method="post">
						@csrf
						<button type="submit">like</button>
					</form>
		        @else
					<form class="mr-1" action="{{route('posts.likes',$post)}}" method="post">
						@csrf
		                @method('DELETE')
						<button type="submit">unlike</button>
					</form>
		        @endif
				<span>{{ $post->likes()->count()}} {{ Str::plural('likes',$post->likes()->count())}}</span>
			</div>
		</div>
	</div>
</div>
@endsection