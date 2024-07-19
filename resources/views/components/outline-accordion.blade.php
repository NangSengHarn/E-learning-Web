@props(['course'])
<div class="accordion" id="accordionExample">
    @foreach ($course->chapters as $chapter)
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading{{ $chapter->chapter_no }}">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $chapter->chapter_no }}" aria-expanded="false" aria-controls="collapse{{ $chapter->chapter_no }}">
          Chapter-{{ $chapter->chapter_no }} : {{ $chapter->name }}                      </button>
      </h2>
      <div id="collapse{{ $chapter->chapter_no }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $chapter->chapter_no }}" data-bs-parent="#accordionExample">
         <div class="accordion-body">
          @foreach ($chapter->lessons as $lesson)
          <div class="mx-3 my-2 py-2" >
             <a href="/courses/{{ $course->slug }}/{{ $chapter->chapter_no }}/{{ $lesson->lesson_no }}" class="text-decoration-none">Lesson-{{ $lesson->lesson_no }} : {{ $lesson->name }}</a>
          </div>                        
          @endforeach
        </div>
       </div>
    </div>
    @endforeach
</div>