
<x-layout>
        <!-- single blog section -->
        <x-single-blog :blog="$blog"/>

        {{-- comments section --}}
        @if ($blog->comments->count())
        <x-comment-section :comments="$blog->comments()->latest()->get()" :blog="$blog"/>
        @endif
    

        <x-blog_you_may_like :randomBlogs="$randomBlogs" />
 
</x-layout>
