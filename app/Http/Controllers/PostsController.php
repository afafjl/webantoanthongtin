<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data= request()->validate([
            'title'=> 'required',
            'description'=>'required',
        ]);


        auth()->user()->posts()->create([
            'title' => $data['title'],
            'description'=> $data['description'],
        ]);
      
        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Models\Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function delete(User $user, Post $post)
    {   
        $this->authorize('delete', $post);
        DB::delete('delete from posts where id= ?' , [$post->id]);
        return redirect("/profile/{$post->user_id}");
        
    }
    public function edit(\App\Models\Post $post)
    {   
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(Post $post){
        $this->authorize('update', $post);
        $data = request()->validate([
            'title'=> 'required',
            'description'=> 'required',
        ]);

          $post->update(array_merge(  $data, ));
        
        return redirect("/p/{$post->id}");
    }
}

