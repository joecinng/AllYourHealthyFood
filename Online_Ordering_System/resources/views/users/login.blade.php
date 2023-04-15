<x-layout>
    <header>
        <h2>Register</h2>
        <p class="mb-4">Create an account</p>
    </header>

    <form action="/users" method="POST">
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" class="form-control" placeholder="Enter email" id="email">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" placeholder="Enter password" id="pwd">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout>