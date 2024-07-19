<?php

namespace App\Http\Controllers;

use App\Mail\SuscriberMail;
use App\Models\Blog;
use App\Models\Comment;
//use App\Notifications\CommentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'body'=>['required','min:3']
        ]);
        $comment=$blog->comments()->create([
            'user_id'=>auth()->id(),
            'body'=>request('body')
        ]);
        $likedUsers=$blog->likedUsers->filter( fn ($likedUser) => $likedUser->id!=auth()->id() );
        $likedUsers->each(function ($likedUser) use ($blog) {
            Mail::to($likedUser->email)->send(new SuscriberMail($blog));
            //Notification::sendNow($likedUser, new CommentNotification($comment));
        });
        return redirect('/blogs/'.$blog->slug);
    }
}
