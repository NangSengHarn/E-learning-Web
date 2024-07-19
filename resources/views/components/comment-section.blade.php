@props(['comments','blog'])
@auth
<x-comment-form :blog="$blog"/>
@else
<p class="text-center text-warning">Please <a href="/login">login</a> to comment in this section.</p>
@endauth
<section class="container" id="comment">
    <div class="col-md-8 mx-auto">
        <h5 class="my-3 text-secondary">Comments {{count($comments)}}</h5>
        @foreach ($comments as $comment)
            <x-single-comment :comment=$comment/>
        @endforeach
    </div>
</section>