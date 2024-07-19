<x-admin-layout>
    <div class="card p-3 shadow">
    <h4 class="text-center">Set User Roll</h4>
        <form action="/admin/authorize" method="POST">
            @csrf
            <div class="mb-3">
                <x-form.label name="name"/>
                <select name="user_id" id="name" class="form-control select-tags" >
                    @foreach ($users as $user)
                    <option {{$user->id==old('user_id') ? 'selected':''}} value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <x-form.error name='name'/>
            </div>
            <div class="mb-3">
                <x-form.label name="Roll"/>
                <select name="usertype" id="roll" class="form-control select-tags" >
                    <option {{'admin'==old('usertype') ? 'selected':''}} value="admin">Admin</option>
                    <option {{'instructor'==old('usertype') ? 'selected':''}} value="instructor">Instructor</option>
                    <option {{'student'==old('usertype') ? 'selected':''}} value="student">Student</option>
                </select>
                <x-form.error name='name'/>
            </div>
            <x-form.submit />
        </form>
    </div>
</x-admin-layout>