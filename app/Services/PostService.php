<?php

namespace App\Services;

use App\Post;
use Illuminate\Http\Request;

class PostService
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $input['tag_id'] = json_encode($input['tag_id']);
       
        $post = $request->except('tag_id');
       
        return $this->post->create($post)->tags()->sync((array)$request->input('tag_id'));
    }

    public function update(Request $request,$post)
    {
        $input['tag_id'] = json_encode($request['tag_id']);
       
        $post_update = $request->except('tag_id');

        $post = Post::findOrFail($post->id);
       
        $post->tags()->sync((array)$request->input('tag_id'));

        return $post->update($post_update);
    }

    public function delete($post)
    {
        $post = Post::findOrFail($post->id);
       
        $post->tags()->detach();

        return $post->delete();
    }

    public function search(Request $request)
    {
        $search = $request['search'];
        
        return Post::with(['category','tags'])->search($search)->paginate(10);
    }
}