<x-layout>
  <header>
      <h2>Login</h2>
      <p class="mb-4">Log into your account</p>
  </header>

  <form action="{{route('users.auth')}}" method="POST">
      @csrf 
      <div class="form-group">
        <label for="email">Email address :</label>
        <input type="email" name="email" value="{{old('email')}}" class="form-control p-4 col-6" placeholder="Enter email">
      </div>
      @error('email')
      <p class="text-danger">{{$message}}</p>  
      @enderror

      <div class="form-group">
        <label for="password">Password :</label>
        <input type="password" name="password" value="{{old('password')}}" class="form-control p-4 col-6" placeholder="Enter password">
      </div>
      @error('password')
      <p class="text-danger">{{$message}}</p>  
      @enderror

      <button type="submit" class="btn mt-4 btn-outline-primary">Login</button>
      <div class="mt-3">
          <p>Don't have an account? <a href="{{route('register')}}">Register</a></p>
      </div>

      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  </form>
</x-layout>