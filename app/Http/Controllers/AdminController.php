<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Book;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index',[
            'courses'=>Course::where('is_approved', false)->latest()->get(),
            'blogs'=>Blog::where('is_approved', false)->latest()->get(),
            'books'=>Book::where('is_approved', false)->latest()->get()
        ]);
    }
    public function authorizing(){
        return view('admin.index',[
        ]);
    }
    public function enroll(){
        return view('admin.index',[
        ]);
    }
}
