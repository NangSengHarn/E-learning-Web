<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    public function index() {
        
        return view('home',[
            'courses'=>Course::where('is_approved', true)->latest()->filter(request(['searchBlog','category','username']))
                ->paginate(3,['*'],'courses')
                ->withQueryString(),
            'blogs'=>Blog::where('is_approved', true)->latest()->filter(request(['searchBlog','category','username']))
                ->paginate(3,['*'],'blogs')
                ->withQueryString()
        ]);
    }
}
