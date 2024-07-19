
<x-layout>
<section class="container text-center" id="blogs">
   <h1 class="display-5 fw-bold mb-4">Blogs & Trick</h1>

   <x-search-blog />

   <x-category-dropdown>
      /blogs
   </x-category-dropdown>

   <!-- blogs section -->
   <x-blog-section 
      :blogs="$blogs" 
      />



</section>

</x-layout>
