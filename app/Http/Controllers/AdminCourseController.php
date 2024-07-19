<?php

namespace App\Http\Controllers;

use App\Mail\SuscriberMail;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class AdminCourseController extends Controller
{
    public function index()
    {
        return view('admin.courses.index',[
            'courses'=>Course::where('is_approved', true)->latest()->paginate(5)
        ]);
    }
    public function create()
    {
        return view('admin.courses.create',[
            'categories'=>Category::all()
        ]);
    }
    public function store()
    {
        //validation
        $formData=request()->validate([
            "name"=>['required'],
            "slug"=>['required',Rule::unique('courses','slug')],
            "description"=>['required'],
            "price"=>['required']
        ]);
        //add user_id to formData
        $formData['user_id']=auth()->id();
        //store thumbnail into thumbnails folder and add storage path to formData
        if(request('thumbnail')){
            $formData['thumbnail']=request()->file('thumbnail')->store('thumbnails');
        }

        $categoryName=request('category');
        $category=Category::firstOrCreate(['name'=>$categoryName,'slug'=>Str::slug($categoryName)]);
        $formData['category_id']=$category->id;

        $formData['intro']="This is intro";
        //create course
        $course=Course::create($formData);

        //mail to subscribers
        // $subscribers=User::all()->filter(fn ($subscriber) => $subscriber->id!=auth()->id()&&$subscriber->is_subscribe==1 );
        // $subscribers->each(function ($subscriber) use ($blog) {
        //     Mail::to($subscriber->email)->queue(new SuscriberMail($blog));
        // });
        //redirect
        return redirect('/admin/courses');

    }
    public function destroy(Course $course)
    {
        $course->delete();
        return back();
    }
    public function edit(Course $course)
    {
        return view('admin.courses.edit',[
            'course'=>$course,
            'categories'=>Category::all()
        ]);
    }
    public function update(Course $course)
    {
        $formData=request()->validate([
            "name"=>['required'],
            "slug"=>['required',Rule::unique('courses','slug')->ignore($course->slug, 'slug')],
            "description"=>['required'],
            "price"=>['required']
        ]);
        //add user_id to formData
        $formData['user_id']=auth()->id();
        //store thumbnail into thumbnails folder and add storage path to formData
        if(request('thumbnail')){
            $formData['thumbnail']=request()->file('thumbnail')->store('thumbnails');
        }
        $categoryName=request('category');
        $category=Category::firstOrCreate(['name'=>$categoryName,'slug'=>Str::slug($categoryName)]);
        $formData['category_id']=$category->id;
        //create course
        Course::findOrFail($course->id)->update($formData);
        
        //redirect
        return redirect('/admin/courses');
    }
}
