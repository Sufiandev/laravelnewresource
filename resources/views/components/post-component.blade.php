{{-- @props(['post' => $post])  --}} 
{{-- if @props use than no need to use in call view component --}}

<div>
    @if($posts->count())
    	@foreach($posts as $post)
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

                    <a href="{{ route('posts.show',$post) }}">View</a>
                    
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
    	@endforeach
    	{{$posts->links() }}
    @else
    no record
    @endif
</div>