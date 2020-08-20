<x-header-link>
    <div id="app">
        <x-navbar/>
        @if(!empty($posts))
        <div class="showpost">
            
            @foreach($posts as $post)
                @if(auth::check())
                    @if($post->published || $post->user_id == Auth::user()->id)
                        <div class="postlist">
                            <a href="{{route('posts.show',$post->id)}}">
                                <h3>{{$post->title}}</h3>
                            </a>
                            <p>{{$post->content}}</p>
                        </div>  
                    @endif
                @elseif(!auth::check())
                    @if($post->published)
                    <div class="postlist">
                        <a href="{{route('posts.show',$post->id)}}">
                            <h3>{{$post->title}}</h3>
                        </a>
                        <p>{{$post->content}}</p>
                    </div>  
                    @endif
                @endif
            @endforeach
        </div>

        {{ $posts->appends(['s'=>$search ?? ''])->links() }}
        @endif
       
    </div>
</x-header-link>
