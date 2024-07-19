<x-user-layout>
    <div class="formbg d-flex justify-content-center align-items-center">
        <x-card-wrapper style="width: 30rem;">
            <form method="POST">
                @csrf
                <div class="text-center"><h3>Register</h3></div>
                <x-form.input name='name'/>
                <x-form.input name='username'/>
                <x-form.input name='email' type='email'/>
                <x-form.input name='password' type='password'/>
                <x-form.submit />
                <div class="d-flex justify-content-center">
                  <span>already have an account? | <a href="/login">LogIn</a></span>
                </div>
            </form>
        </x-card-wrapper>
    </div>
</x-user-layout>
{{-- <x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center my-2">Register Form</h3>
                <div class="card p-4 my-3 shadow-sm">
                <form method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('name') }}">
                        @error('name')
                        <p class="text-danger">{{ message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('username') }}">
                        @error('username')
                        <p class="text-danger">{{ message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') }}">
                      @error('email')
                        <p class="text-danger">{{ message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input name="password" type="password" class="form-control" id="exampleInputPassword1" >
                      @error('password')
                        <p class="text-danger">{{ message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-layout> --}}