<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostLikeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function store(Post $post, Request $request)
    {
        // dd('ok');
        // dd($post);
        //dd($post->likedBy($request->user()));

        if ($post->likedBy($request->user())) {
            return response(null,489); // conflict, already liked ->shows error page 498
        }

        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);
        
        return back();
    }

    public function destroy(Post $post, Request $request)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }


} // end of class
