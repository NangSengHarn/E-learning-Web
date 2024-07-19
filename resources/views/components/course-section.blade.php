@props(['courses'])
    <div class="row mt-3">
      @forelse ($courses as $course)
      <div class="col-md-4 mb-4">
       <x-course-card :course="$course"/>
      </div>
      @empty
      <p class="text-center">No Course Found.</p>
      @endforelse
      {{ $courses->links() }}
    </div>