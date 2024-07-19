<x-admin-layout>
    <x-card-wrapper class="mt-0">
    <x-single-blog :blog="$blog"/>
    @can('admin')
    <div class="text-center my-2">
        <a href="/admin/blogs/{{$blog->slug}}/edit" class="btn btn-primary">Edit This Blog</a>
    </div>
    @endcan
    </x-card-wrapper>
</x-admin-layout>