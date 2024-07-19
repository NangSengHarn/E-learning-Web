<x-admin-layout>
    @if ($courses->count())
    <x-table name="courses">
        <thead>
          <tr>
            <th width="40%" scope="col" class="text-primary">Name</th>
            <th width="40%" scope="col" class="text-primary">Instuctor</th>
            <th width="20%" scope="col" colspan="2" class="text-center text-primary">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            
            <tr>
              
                <td><a href="/admin/courses/{{ $course->slug }}">{{$course->name}}</a></td>
                <td>{{$course->instructor->name}}</td>
                <td class="text-center">
                    <form action="/admin/courses/{{$course->slug}}/approve" method="POST">
                        @csrf
                        <button type="submit" class="btn approve-btn">Approve</button>
                    </form>
                </td>
                <td class="text-center">
                    <form action="/admin/courses/{{$course->slug}}/delete" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn delete-btn">Reject</button>
                    </form>
                </td>
              
            </tr>
            
            @endforeach
          </tbody>
        </table>
    </x-table>
    @else
    <x-card-wrapper class="mt-0">
        <div class="text-center"><h3>No Pending Courses</h3></div>
    </x-card-wrapper>
    @endif

    @if ($blogs->count())
    <x-table name="blogs">
        <thead>
          <tr>
            <th width="40%" scope="col" class="text-primary">Title</th>
            <th width="40%" scope="col" class="text-primary">Intro</th>
            <th width="20%" scope="col" colspan="2" class="text-center text-primary">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
            <tr>
                <td><a href="/admin/blogs/{{ $blog->slug }}">{{$blog->title}}</a></td>
                <td>{{substr(strip_tags($blog->body),0,35).'...';}}</td>
                <td class="text-center">
                    <form action="/admin/blogs/{{$blog->slug}}/approve" method="POST">
                        @csrf
                        <button type="submit" class="btn approve-btn">Approve</button>
                    </form>
                </td>
                <td class="text-center">
                    <form action="/admin/blogs/{{$blog->slug}}/delete" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn delete-btn">Reject</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </x-table>
    @else
    <x-card-wrapper>
        <div class="text-center"><h3>No Pending Blogs</h3></div>
    </x-card-wrapper>
    @endif

    {{-- @if ($books->count())
    <x-table name="books">
        <thead>
            <tr>
                <th width="40%" scope="col" class="text-primary">Title</th>
                <th width="40%" scope="col" class="text-primary">Intro</th>
                <th width="20%" scope="col" colspan="2" class="text-center text-primary">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
                
        <tr>
                  
            <td><a href="/admin/books/{{ $book->slug }}">{{$book->title}}</a></td>
            <td>{{substr(strip_tags($book->body),0,35).'...';}}</td>
            <td class="text-center">
                    <form action="/admin/books/{{$book->slug}}/approve" method="POST">
                        @csrf
                        <button type="submit" class="btn approve-btn">Approve</button>
                    </form>
                </td>
                <td class="text-center">
                    <form action="/admin/books/{{$book->slug}}/delete" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn delete-btn">Reject</button>
                    </form>
                </td>
                  
        </tr>
                
        @endforeach
        </tbody>
        </table>
        
    </x-table>
    @else
    <x-card-wrapper>
        <div class="text-center"><h3>No Pending Books</h3></div>
    </x-card-wrapper>
    @endif --}}
</x-admin-layout>