<x-user-layout>
  <div class="formbg d-flex justify-content-center align-items-center">
      <x-card-wrapper style="width: 30rem;">
          <form action="" method="POST">
              @csrf
              <div class="text-center"><h3>LogIn</h3></div>
              <x-form.input name='email' type='email'/>
              <x-form.input name='password' type='password'/>
              <x-form.submit />
              <div class="d-flex justify-content-center mb-3">
                <span>don't have an account? | <a href="/register">Register</a></span>
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
                    
                    <button type="submit" class="btn btn-primary">Login</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-layout> --}}