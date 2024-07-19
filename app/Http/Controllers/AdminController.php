<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Book;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        return view('admin.authorizing',[
            'users'=>User::all()->except('usertype','admin')
        ]);
    }
    public function enroll(){
        return view('admin.enroll',[
            'courses'=>Course::where('is_approved', true)->latest()->get()
        ]);
    }
    public function enrollHandler() {
        request()->validate([
            'course_id'=>['required',Rule::exists('courses','id')],
            'email'=>['required','email',Rule::exists('users','email')]
        ]);
        $course_id=request('course_id');
        $student_id=User::firstWhere('email',request('email'))->id;

        $course = Course::find($course_id);
        $course->enroll($student_id);
        return back()->with('success','Enroll Success');;
    }
    public function authorizingHandler() {
        request()->validate([
            'user_id'=>['required',Rule::exists('users','id')],
            'usertype'=>['required']
        ]);
        User::findOrFail(request('user_id'))->update(['usertype'=>request('usertype')]);
        return back()->with('success','Success');;
    }
}
