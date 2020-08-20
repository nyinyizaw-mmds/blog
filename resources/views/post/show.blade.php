<x-header-link>
     <div class="postdetail">
          <div class="title">
               <h4>{{$post_detail->title}}</h4>  
               [<span>{{$post_detail->category->name}}</span>]
          </div>
          @foreach($post_detail->tags as $tag)
               <small>#{{$tag->name}}</small>
          @endforeach
          <p>{{$post_detail->content}}</p>
         
        

          @if(auth::check() && Auth::user()->id == $post_detail->user_id)
              <div class="edit-delete">
              <a href="{{route('posts.edit',$post_detail->id)}}">Edit</a> | 

               <form action="{{route('posts.destroy',$post_detail->id)}}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="delete">Delete</button>
               </form>
              </div>
          @endif
     </div>
</x-header-link>