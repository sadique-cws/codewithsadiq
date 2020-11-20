<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Code with sadiQ</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <a class="navbar-brand" href="{{route('dashboard')}}">Admin Panel | CWS</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
              
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Logout</a></li>

            </ul>
          
          </div>
        </div>
      </nav>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                  Course
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="{{ route('adminCourseAdd')}}">New Course</a></li>
                <li><a class="dropdown-item" href="{{ route('adminCourse')}}">Manage Course</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('adminCategory')}}">Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('coupon')}}" id="navbarDarkDropdownMenuLink">Coupon</a>
               
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                  Students
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="{{route('students')}}">Active Students</a></li>
                 </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                  Payments
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="{{route('payments')}}">Recent Payments</a></li>
                  </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                  Workshop
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                  Internship
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

     
    
      @section('content')
          
      @show
    
<!-- JavaScript Bundle with Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous"></script>     
  </body>
</html>