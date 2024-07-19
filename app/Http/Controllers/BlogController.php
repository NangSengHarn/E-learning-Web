<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        return view('blogs.index',[
            'blogs'=>Blog::where('is_approved', true)->latest()->filter(request(['searchBlog','category','username']))
            ->paginate(6)
            ->withQueryString()
        ]);
    }

    public function show(Blog $blog) {
        return view('blogs.show',[
            'blog'=>$blog,
            'randomBlogs'=>Blog::where('is_approved', true)->inRandomOrder()->take(3)->get()
        ]);
    }
    
    public function likeHandler(Blog $blog) {
        if(User::find(auth()->id())->isLiked($blog)){
            $blog->unlike();
        }else{
            $blog->like();
        }
        return back();
    }

}