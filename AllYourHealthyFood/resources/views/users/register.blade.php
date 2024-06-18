<x-layout>
    <header>
        <h2>Register</h2>
        <p class="mb-4">Create an account</p>
    </header>

    <form action="{{route('users')}}" method="POST">
        @csrf 
        <div class="form-group">
            <label for="name">Full name:</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control p-4 col-6" placeholder="Enter name">
        </div>
        @error('name')
        <p class="text-danger">{{$message}}</p>  
        @enderror

        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" name="email" value="{{old('email')}}" class="form-control p-4 col-6" placeholder="Enter email">
        </div>
        @error('email')
        <p class="text-danger">{{$message}}</p>  
        @enderror

        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" name="password" value="{{old('password')}}" class="form-control p-4 col-6" placeholder="Enter password">
        </div>
        @error('password')
        <p class="text-danger">{{$message}}</p>  
        @enderror

        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" value="{{old('conPassword')}}" class="form-control p-4 col-6" placeholder="Enter confirm password">
        </div>
        @error('password_confirmation')
        <p class="text-danger">{{$message}}</p>  
        @enderror

        <button type="submit" class="btn mt-4 btn-outline-warning">Register</button>
        <div class="mt-3">
            <p>Already have an account? <a href="{{route('login')}}">Login</a></p>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
</x-layout>