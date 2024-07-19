<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {
        
        return view('courses.index',[
            'courses'=>Course::where('is_approved', true)->latest()->filter(request(['searchCourse','category','username']))
            ->paginate(6)
            ->withQueryString()
        ]);
    }

    public function show(course $course) {
        return view('courses.show',[
            'course'=>$course,
            'randomcourses'=>Course::where('is_approved', true)->inRandomOrder()->take(3)->get()
        ]);
    }
}
