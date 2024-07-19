
<div class="dropdown">
    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      {{ isset($currentCategory) ? $currentCategory->name : "Filter By Category" }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      <li><a class="dropdown-item" href="{{ $slot }}">All</a></li>
      @foreach ($categories as $category)
      <li>
        <a 
          class="dropdown-item" 
          href="{{ $slot }}/?category={{ $category->slug }}{{ request('searchBlog') ? '&searchBlog='.request('searchBlog') : '' }}{{ request('username') ? '&username='.request('username') : '' }}"

          >
        
            {{ $category->name }}
        </a>
      </li>
      @endforeach
    </ul>
</div>