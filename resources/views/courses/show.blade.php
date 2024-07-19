
<x-layout>
   <!-- single course section -->
   <section>
   <div class="d-flex justify-content-center">
   <div class="container mx-5 mt-5 px-5">
   <h2>{{ $course->name }}</h2>
   <div class="card border-primary">
      <div class="card-body">
         <div class="row mt-2">
            <div class="col-md-4"><img class="single-course-img rounded" src="{{ asset("storage/images/Course-python.jpg") }}" alt="course-img"></div>
         
         <div class="col-md-8 d-flex flex-column mb-3">
            <div class="p-2 d-flex justify-content-between">
               <div>
                  <img class="profile-img rounded-circle" src="{{ asset("storage/images/Founder.jpg") }}" alt="instructor-profile">
                  <span>Instructor - {{ $course->instructor->name }}</span>
               </div>
               <div class="fs-3">
                  <span class="text-primary"><i class="fa-brands fa-square-facebook"></i></span>
                  <span class="text-primary"><i class="fa-brands fa-linkedin"></i></span>
                  <span class="text-primary"><i class="fa-brands fa-square-github"></i></span>
               </div>
            </div>
            <div class="p-2 d-flex justify-content-between">
               <div>
                  <span class="text-primary">Learning Students<br>500+</span>
               </div>
               <div>
                  <span class="text-primary">Certified Students<br>120+</span>
               </div>
               <div>
                  <span class="text-primary">Course Fees<br>{{ $course->price }}</span>
               </div>
            </div>
            <div class="p-2 d-flex justify-content-start">
               <div>
                  <span>Total Chapters - 9 <br>Total Videos - 85</span>
               </div>
            </div>
          </div>
      </div>
   </div>
   </div>
   <div class="mt-5">
      <h3>About Course</h3>
      <p>{{ $course->description }}</p>
   </div>
   <div class="mt-5">
      <h3>Course Outline</h3>
      <div class="card border-primary px-5 py-3">
         <div class="card-body">

            <x-outline-accordion :course="$course" />
            
         </div>
      </div>
   </div>
</div>
</section>
</x-layout> 