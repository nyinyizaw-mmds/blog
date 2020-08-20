<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Http\Requests\PostSaveRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Requests\SearchRequest;
use App\Repositories\CategoryRepository;
use App\Tag;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Services\PostService;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request,PostService $postService)
    {
        $posts = $postService->search($request);

        // $posts = $this->blogRepository->all();
        return view('layouts.app',compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create',compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostSaveRequest $request,PostService $postService)
    {
       
        $postService->create($request);

        return view('post.index');
        // $input['cat'] = json_encode($input['cat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post_detail = $this->postRepository->getByPost($post);
        return view('post.show',compact(['post_detail']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post,CategoryRepository $cat,TagRepository $tag)
    {
        $categories = $cat->all();
        $tags = $tag->all();

        return view('post.edit',compact(['post','categories','tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post,PostService $postService)
    {
        $postService->update($request,$post);
       
        return redirect('/');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post,PostService $postService)
    {
       $postService->delete($post);
       return redirect('/');
    }
}
