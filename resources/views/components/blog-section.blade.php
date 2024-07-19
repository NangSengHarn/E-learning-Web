@props(['blogs'])

    <div class="row mt-3">
      @forelse ($blogs as $blog)
      <div class="col-md-4 mb-4">
       <x-blog-card :blog="$blog"/>
      </div>
      @empty
      <p class="text-center">No Blogs Found.</p>
      @endforelse
      {{ $blogs->links() }}
    </div>
      