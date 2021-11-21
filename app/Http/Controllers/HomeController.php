<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(20)->get();
        return view('welcome', compact('posts'));
    }
    public function search(){
         // $q = Request();
          $q = Request::get('q');
         $posts = Post::where('description','like','%'.$q.'%')->orWhere('title','like','%'.$q.'%')->paginate(20);
         
        return view('welcome' , compact('posts'));
    }

}
    