<x-layout>
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-3 py-3">
                <ul class="list-group">
                    @can('admin')
                    <li class="list-group-item"><a href="/admin/pending">Pending</a></li>
                    <li class="list-group-item"><a href="/admin/authorize">Manage Users</a></li>
                    <li class="list-group-item"><a href="/admin/enroll">Enroll Students</a></li>
                    @endcan
                    <li class="list-group-item"><a href="/admin/courses">Courses</a></li>
                    <li class="list-group-item"><a href="/admin/blogs">Blogs</a></li>
                    <li class="list-group-item"><a href="/admin/books">Books</a></li>
                </ul>
            </div>
            <div class="col-md-9 py-3">
                {{$slot}}
            </div>
        </div>
    </div>
</x-layout>
