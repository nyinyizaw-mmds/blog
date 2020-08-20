<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $postRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = $this->postRepository->all();
        return view('layouts.app',compact(['posts']));
    }
}
