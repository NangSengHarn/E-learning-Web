<x-admin-layout>
    <div class="card p-3 shadow">
    <h4 class="text-center">Edit blog</h4>
        <form enctype="multipart/form-data" action="/admin/blogs/{{$blog->slug}}/update" method="POST">
            @method('patch')
            @csrf
            <x-form.input name='title' :value="$blog->title"/>
            <x-form.input name='slug' :value="$blog->slug"/>
            <div class="mb-3">
                <x-form.label name='body'/>
                <textarea required name="body" id="body" cols="20" rows="10" class="form-control editor">{{$blog->body}}</textarea>
                <x-form.error name='body'/>
            </div>
            <x-form.input-wrapper>
                <x-form.label name="thumbnail"/>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" value="{{old('thumbnail')}}">
                @if ($blog->thumbnail)
                <div class="mt-3">
                    <img src='{{asset("storage/$blog->thumbnail")}}' class="img-thumbnail" id="img" width="250px" height="150px">
                </div>
                @endif
                <x-form.error name="thumbnail"/>
            </x-form.input-wrapper>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-control select-tags">
                    @foreach ($categories as $category)
                    <option {{$category->id==old('category_id',$blog->category_id) ? 'selected':''}} value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <x-form.error name='category'/>
            </div>
            
            <x-form.submit />
        </form>
    </div>
</x-admin-layout>