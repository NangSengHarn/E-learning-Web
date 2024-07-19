<x-admin-layout>
    <div class="card p-3 shadow">
    <h4 class="text-center">Blog create form</h4>
        <form enctype="multipart/form-data" action="/admin/blogs/store" method="POST">
            @csrf
            <x-form.input name='title'/>
            <x-form.input name='slug'/>
            <div class="mb-3">
                <x-form.label name='body'/>
                {{-- <x-form.editor-wrapper> --}}
                <textarea name="body" id="body" name="body" cols="20" rows="10" class="form-control editor">{{old('body')}}</textarea>
                {{-- </x-form.editor-wrapper> --}}
                <x-form.error name='body'/>
            </div>
            <x-form.input-wrapper>
                <x-form.label name="thumbnail"/>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" value="{{old('thumbnail')}}">
                <div class="mt-3">
                <img src='' class="img-thumbnail" id="img" width="250px" height="150px" hidden>
                </div>
                <x-form.error name="thumbnail"/>
            </x-form.input-wrapper>
            <div class="mb-3">
                <x-form.label name="category"/>
                <select name="category" id="category" class="form-control select-tags">
                    @foreach ($categories as $category)
                    <option {{$category->name==old('category') ? 'selected':''}} value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <x-form.error name='category'/>
            </div>
            <x-form.submit />
        </form>
    </div>
</x-admin-layout>