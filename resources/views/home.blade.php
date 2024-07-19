
<x-layout>
    
    <!-- hero section -->
    <x-hero />
    <!-- course section -->
    <section class="container text-center" id="courses">
        <h1 class="display-5 fw-bold mb-4">Our Premium Course</h1>
        <x-course-section :courses="$courses"/> 
    </section>

    <!-- blogs section -->
    <section class="container text-center" id="blogs">
        <h1 class="display-5 fw-bold mb-4">Blogs & Trick</h1>
        <x-blog-section  :blogs="$blogs"/>
    </section>

    <!-- certificate section -->
    <x-certificatesection />

    <!-- review section -->
    {{-- <x-reviewsection /> --}}

    <!-- history section -->
    <x-historysection />


    

</x-layout>
