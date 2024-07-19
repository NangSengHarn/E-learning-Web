@props(['blog'])
<div class="card">
  <img
    src="{{ asset("storage/$blog->thumbnail") }}"
    class="card-img-top"
    alt="..."
    />
  <div class="card-body">
    <h3 class="card-title">{{$blog->title}}</h3>
    <p class="fs-6 text-secondary">
      <a href="/blogs/?username={{ $blog->author->username }}{{ request('searchBlog') ? '&searchBlog='.request('searchBlog') : '' }}{{ request('category') ? '&category='.request('category') : '' }}">{{ $blog->author->name }}</a>
      <span> - {{ $blog->created_at->diffForHumans() }}</span>
    </p>
    <div class="tags my-3">
      <a href="/blogs/?category={{ $blog->category->slug }}{{ request('searchBlog') ? '&searchBlog='.request('searchBlog') : '' }}{{ request('username') ? '&username='.request('username') : '' }}"><span class="badge bg-primary">{{ $blog->category->name }}</span></a>
    </div>
    <p class="card-text">
      {{$blog->intro}}
    </p>
    <a href="/blogs/{{ $blog->slug }}" class="btn btn-primary">Read More</a>
  </div>
</div>