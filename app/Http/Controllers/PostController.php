<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::get(); // Collection
        $posts = Post::orderBy('created_at','desc')->with(['user','likes'])->paginate(2);
        // dd($posts);
        return view('posts.index',[
            'posts' => $posts
        ]);
    }
    public function store(Request $request)
    {
        //dd('post store ok(');
        $this->validate($request,[
            'body'=>'required',
        ]);  
        
        $request->user()->posts()->create(
           // ['body'=> $request->body]
            $request->only('body')
        );

        return back();
    }
    public function destroy(Post $post)
    {
        //dd($post);

        // if ($post->ownedBy(auth()->user())) {
        //     dd('This post cannot be deleted by you.');
        // }
        $this->authorize('delete',$post);

        $post->delete();
        return back();
        
    }
}
