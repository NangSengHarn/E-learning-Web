@props(['course'])
<div class="card">
  <img
    src="{{ asset("storage/images/Course-laravel.jpg") }}"
    class="card-img-top"
    alt="..."
    />
  <div class="card-body">
    <h3 class="card-title">{{$course->name}}</h3>
    <div class="tags my-3">
      <a href="/courses/?username={{ $course->instructor->username }}{{ request('searchCourse') ? '&searchCourse='.request('searchCourse') : '' }}{{ request('category') ? '&category='.request('category') : '' }}">{{ $course->instructor->name }}</a>
      <a href="/courses/?category={{ $course->category->slug }}{{ request('searchCourse') ? '&searchCourse='.request('searchCourse') : '' }}{{ request('username') ? '&username='.request('username') : '' }}"><span class="badge bg-primary">{{ $course->category->name }}</span></a>
    </div>
    <p class="card-text">
      {{$course->description}}
    </p>
    <div class="price my-3">
      <span>Fees - {{ $course->price }}</span>
    </div>
    <a href="/courses/{{ $course->slug }}" class="btn btn-primary">Learn More</a>
  </div>
</div>