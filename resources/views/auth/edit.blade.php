<x-user-layout>
    <div class="formbg d-flex justify-content-center align-items-center" style="padding-top: 70px;">
        <x-card-wrapper style="width: 70rem; height: 30rem;">
            <form enctype="multipart/form-data" method="POST" class="container-fluid h-100">
                @csrf
                <div class="text-center"><h3>Edit Profile</h3></div>
                <div class="row py-4">
                    <div class="col-4  d-flex justify-content-center">
                        <div class="avatarupdate">
                        <img src="{{asset('storage/'.auth()->user()->avatar)}}" class="rounded-circle d-block" id="img" alt="..." width="200" height="200">
                        <a href="" class="file btn mt-3 d-block text-center">Change profile photo <input type="file" name="avatar" id="upload"></a>
                        </div>
                    </div>
                    <div class="col-8">
                        <x-form.input name='name' :value="auth()->user()->name"/>
                        <x-form.input name='username' :value="auth()->user()->username"/>
                        <x-form.input name='email' type='email' :value="auth()->user()->email"/>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </x-card-wrapper>
    </div>
</x-user-layout>