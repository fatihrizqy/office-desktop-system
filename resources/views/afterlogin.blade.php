<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Project1</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{URL::asset('style.css')}}" />
  </head>
  <body>
  <nav class="navbar bg-light fixed-top">
  <div class="container-fluid fw-bold">

    <a class="navbar-brand" href="#">Dashboard</a>

  </div>
</nav>
<div class=" d-flex">
    <div class="link-content container">
    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 mt-5">
          <li class="nav-item mt-5">
            <a class="nav-link " aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item mt-2">
            <a class="nav-link" href="/employee">Employee</a>
          </li>
          <li class="nav-item mt-2">
            <a class="nav-link" href="/department">Department</a>
          </li>
          <li class="nav-item mt-2">
            <a class="nav-link" href="/country">Country</a>
          </li>
          <li class="nav-item mt-2">
            <a class="nav-link" href="/folder">Folder</a>
          </li>
          
          <li class="nav-item mt-2">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
        </ul>
    </div>
    <div class="contents">
        @yield("container")
    </div>
</div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>