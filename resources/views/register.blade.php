@extends("main")

@section("container")
<div class="container d-flex flex-row head-contain">
      <div class="m-auto login-container">
        <h1 class="text-center mb-5 ">Sign Up</h1>
        <form action='{{route("postRegister")}}' method="post">
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
            <label for="exampleInputEmail1" class="form-label"
              >Email</label
            >
            <input
              type="email"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              name="email"
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
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"
              >Department</label
            >
            <select class="form-select" aria-label="Default select example" name="department">
              <option selected>Select</option>
              @foreach($department as $d)
              <option value="{{$d->DepartementId}}">{{$d->DeptName}}</option>
              @endforeach
            </select>
          
          </div>
         
         
            <p class="invalid-feedback d-block">{{ session('error') }}</p>
            <a href="/login" class="text-center d-block">Login</a>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
@endsection