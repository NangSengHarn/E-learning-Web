<nav class="navbar navbar-light ">
    <div class="container shadow-sm" style="padding: 0%">
      <a class="navbar-brand" href="/"><img src='{{ asset("storage/images/Code.edu.png") }}' alt="logoimage" class="nav-logo"></a>
      <div class="d-flex align-items-center">
        <a href="/" class="nav-link">Home</a>
        <a href="/courses" class="nav-link">Courses</a>
        <a href="/#ebooks" class="nav-link">Library</a>
        <a href="/blogs" class="nav-link">Blogs & Trick</a>
        <a href="/#subscribe" class="nav-link">Subscribe</a>
        @guest
        <a href="/login" class="nav-link">Login</a>
        @else
        @if (auth()->user()->usertype=="instructor")
        <a href="/admin/courses" class="nav-link">Dashboard</a>
        @endif
        @can('admin')
        <a href="/admin/pending" class="nav-link">Dashboard</a>
        @endcan
        <div class="dropdown nav-link">
          <a class="btn btn-outline dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src='/storage/{{ auth()->user()->avatar}}' width="50" height="50" class="rounded-circle">
            <span>{{ auth()->user()->name }}</span>
          </a>
          <div class="dropdown-menu">
            <form action="/logout" method="POST">
              @csrf
              <button class="dropdown-item btn btn-link" type="submit">Logout</button>
            </form>          
          </div>
        </div>
        @endguest

      </div>
    </div>
  </nav>