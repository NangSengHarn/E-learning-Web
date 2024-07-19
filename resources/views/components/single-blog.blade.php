@props(["blog"])
<div class="container" style="margin-top: 70px;">
    <div class="row">
      <div class="col-md-8 mx-auto text-center">
        @if ($blog->thumbnail)
        <img src='{{asset("storage/$blog->thumbnail")}}' class="card-img-top" alt="...">
        @endif
        <div class="d-flex justify-content-between pt-2">
            <div>Author - <a href="/blogs/?username={{$blog->author->username}}
                {{request('searchBlog')?'&searchBlog='.request('searchBlog'):''}}
                {{request('category')?'&category='.request('category'):''}}">
                    {{$blog->author->name}}
            </a></div>
            <div>
                @auth
                <form action="/blogs/{{$blog->slug}}/likeunlike" method="POST">
                @csrf
                @if (auth()->user()->isLiked($blog))
                    <button class="btn btn-link text-primary" type="submit"><i class="fa-solid fa-thumbs-up h4"></i></button>
                @else
                    <button class="btn btn-link text-primary" type="submit"><i class="fa-regular fa-thumbs-up h4"></i></button>
                @endif
                </form>
                @endauth
            </div>
        </div>
        <div class="d-flex justify-content-between pt-2">
            <div class="text-secondary align-self-center">published - {{$blog->created_at->diffForHumans()}}</div>
            <div class="tags my-3">
                <a href="/?category={{$blog->category->slug}}
                    {{request('searchBlog')?'&searchBlog='.request('searchBlog'):''}}
                    {{request('username')?'&username='.request('username'):''}}">
                    <span class="badge bg-warning">{{$blog->category->name}}</span>
                </a>
            </div>
        </div>
        <h3 class="my-3">{{$blog->title}}</h3>
        <p class="lh-md mt-3">
            {!!$blog->body!!}
        </p>
        
      </div>
    </div>
</div>