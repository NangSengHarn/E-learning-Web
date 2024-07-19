<x-admin-layout>
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
              
                <td><a href="/blogs/{{ $blog->slug }}" target="_blank">{{$blog->title}}</a></td>
                <td>{{substr(strip_tags($blog->body),0,35).'...';}}</td>
                <td class="text-center"><a href="/admin/blogs/{{$blog->slug}}/edit" class="btn edit-btn">Edit</a></td>
                <td class="text-center">
                    <form action="/admin/blogs/{{$blog->slug}}/delete" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn delete-btn">Delete</button>
                    </form>
                </td>
              
            </tr>
            
            @endforeach
          </tbody>
        </table>
        {{ $blogs->links() }}
        <div class="text-center mx-2">
          <a href="/admin/blogs/create" class="btn btn-primary">Create New Blog</a>
        </div>
        </x-table>
</x-admin-layout>