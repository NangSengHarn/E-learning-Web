<x-layout>
    <div class="container justify-content-center py-3">
      <div class="card">
        <div class="row p-2">
        <div class="col-lg-8 ">
            <div class="ratio ratio-16x9">
                <iframe src="{{ asset("$lesson->video") }}" title="lesson video" allowfullscreen></iframe>
            </div>       
        </div>
        <div class="col-lg-4 ">
          <div class="card p-2">
            <h3 class="text-primary text-center">{{ $course->name }}</h3>
            
          </div>
            <x-outline-accordion :course="$course" />
        </div>
        </div>
      </div>
    </div>
</x-layout>