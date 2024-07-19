
<x-layout>
   <section class="container text-center" id="courses">
      <h1 class="display-5 fw-bold mb-4">Courses</h1>
   
      <x-search-course />
   
      <x-category-dropdown>
         /courses
      </x-category-dropdown>
   
      <!-- courses section -->
      <x-course-section 
         :courses="$courses" 
         />
         
   
   </section>
   
   </x-layout>
   