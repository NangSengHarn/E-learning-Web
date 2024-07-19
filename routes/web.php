<?php

use App\Http\Controllers\AdminBLogController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[HomeController::class,'index']);

Route::get('/courses',[CourseController::class,'index']);

Route::get('/courses/{course:slug}',[CourseController::class,'show']);

Route::get('/courses/{course:slug}/{chapter:chapter_no}/{lesson:lesson_no}',[LessonController::class,'show']);

Route::get('/blogs', [BlogController::class,'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class,'show']);

Route::get('/books', [BookController::class,'index']);

Route::get('/books/{book:slug}', [BookController::class,'show']);

Route::get('/register',[AuthController::class,'create'])->middleware('guest');

Route::post('/register',[AuthController::class,'store'])->middleware('guest');

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::get('/login',[AuthController::class,'login'])->middleware('guest');

Route::post('/login',[AuthController::class,'post_login'])->middleware('guest');

Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store']);

Route::post('/blogs/{blog:slug}/likeunlike',[BlogController::class,'likeHandler']);

//instructor routes
Route::middleware('can:instructor')->group(function(){
    Route::get('/admin/blogs',[AdminBLogController::class,'index']);

    Route::get('/admin/blogs/create',[AdminBLogController::class,'create']);
    
    Route::post('/admin/blogs/store',[AdminBLogController::class,'store']);
    
    Route::get('/admin/blogs/{blog:slug}/edit',[AdminBLogController::class,'edit']);
    
    Route::patch('/admin/blogs/{blog:slug}/update',[AdminBLogController::class,'update']);
});

//admin routes
Route::middleware('can:admin')->group(function(){
    Route::get('/admin/pending',[AdminController::class,'index']);

    Route::get('/admin/authorize',[AdminController::class,'authorizing']);

    Route::post('/admin/authorize',[AdminController::class,'authorizingHandler']);

    Route::get('/admin/enroll',[AdminController::class,'enroll']);

    Route::post('/admin/enroll',[AdminController::class,'enrollHandler']);

    Route::get('/admin/blogs/{blog:slug}', [AdminBlogController::class,'show']);


    //approve
    Route::post('/admin/courses/{course:slug}/approve',[AdminCourseController::class,'approve']);

    Route::post('/admin/blogs/{blog:slug}/approve',[AdminBlogController::class,'approve']);

    Route::post('/admin/books/{book:slug}/approve',[AdminBookController::class,'approve']);

    //reject or delete
    Route::delete('/admin/courses/{course:slug}/delete',[AdminCourseController::class,'destroy']);

    Route::delete('/admin/blogs/{blog:slug}/delete',[AdminBLogController::class,'destroy']);

    Route::delete('/admin/books/{book:slug}/delete',[AdminBookController::class,'destroy']);
});

