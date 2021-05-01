<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(){
        // dd(auth()->user());
        // dd(auth()->user()->posts()); // posts method shows relationship hasMany
        // dd(auth()->user()->posts);  // posts property show Collections
        // dd(Post::find(3)->created_at); // Carbon third party tool
        return view('dashboard');
    }

} // end of class
