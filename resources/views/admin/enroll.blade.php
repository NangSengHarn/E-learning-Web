<x-admin-layout>
    <div class="card p-3 shadow">
    <h4 class="text-center">Enroll form</h4>
        <form enctype="multipart/form-data" action="/admin/enroll" method="POST">
            @csrf
            <div class="mb-3">
                <x-form.label name="course"/>
                <select name="course_id" id="course" class="form-control select-tags" >
                    @foreach ($courses as $course)
                    <option {{$course->id==old('course_id') ? 'selected':''}} value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
                <x-form.error name='course'/>
            </div>
            <x-form.input name='email' type='email'/>
            <x-form.submit />
        </form>
    </div>
</x-admin-layout>