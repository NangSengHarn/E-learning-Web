<?php

namespace App\Http\Controllers;

use App\Mail\SuscriberMail;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class AdminBLogController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index',[
            'blogs'=>Blog::where('is_approved', true)->latest()->paginate(5)
        ]);
    }
    public function show(Blog $blog) {
        return view('admin.blogs.show',[
            'blog'=>$blog
        ]);
    }
    public function create()
    {
        return view('admin.blogs.create',[
            'categories'=>Category::all()
        ]);
    }
    public function store()
    {
        //validation
        $formData=request()->validate([
            "title"=>['required'],
            "slug"=>['required',Rule::unique('blogs','slug')],
            "body"=>['required']
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
        //create blog
        $blog=Blog::create($formData);

        //mail to subscribers
        $subscribers=User::all()->filter(fn ($subscriber) => $subscriber->id!=auth()->id()&&$subscriber->is_subscribe==1 );
        $subscribers->each(function ($subscriber) use ($blog) {
            Mail::to($subscriber->email)->queue(new SuscriberMail($blog));
        });
        //redirect
        return redirect('/admin/blogs');

    }
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back();
    }
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit',[
            'blog'=>$blog,
            'categories'=>Category::all()
        ]);
    }
    public function update(Blog $blog)
    {
        $formData=request()->validate([
            "title"=>['required'],
            "slug"=>['required',Rule::unique('blogs','slug')->ignore($blog->id)],
            "body"=>['required']
        ]);
        //add user_id to formData
        $formData['user_id']=auth()->id();
        //store thumbnail into thumbnails folder and add storage path to formData
        
            $formData['thumbnail']=request()->file('thumbnail')?
            request()->file('thumbnail')->store('thumbnails'):$blog->thumbnail;
        
        $categoryName=request('category');
        $category=Category::firstOrCreate(['name'=>$categoryName,'slug'=>Str::slug($categoryName)]);
        $formData['category_id']=$category->id;
        //create blog
        Blog::findOrFail($blog->id)->update($formData);
        
        //redirect
        return redirect('/admin/blogs');
    }
    public function approve(Blog $blog)
    {
        
        //set is_approved column to true
        Blog::findOrFail($blog->id)->update(['is_approved'=>1]);
        
        //redirect
        return redirect('/admin/pending');
    }
}
