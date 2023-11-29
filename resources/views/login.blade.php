@extends("main")

@section("container")
<div class="container d-flex flex-row head-contain">
      <div class="m-auto login-container">
        <h1 class="text-center mb-5 ">Login</h1>
        <form action='{{route("postLogin")}}' method="post">
            @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"
              >Username</label
            >
            <input
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              name="name"
              required
            />
          
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"
              >Password</label
            >
            <input
              type="password"
              class="form-control"
              id="exampleInputPassword1"
              name="password"
              required
            />
          </div>
         
         
            <p class="invalid-feedback d-block">{{ session('status') }}</p>
<a href="/register" class="text-center d-block">Sign Up</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
@endsection