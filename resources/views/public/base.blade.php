
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;1,300;1,400;0,800;0,500;&display=swap" rel="stylesheet">
    <title>Code with sadiQ</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
        <a class="navbar-brand" href="{{route('homepage')}}"><img src="{{ asset('newlogo.png') }}" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link  text-capitalize" href="#" role="button" >Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDarkDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                  Courses
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" style="z-index: 9999" aria-labelledby="navbarDarkDropdownMenuLink">
                  @foreach ($category as $cat)
                      <li><a class="dropdown-item small" aria-current="page" href="#">{{$cat->cat_title}}</a></li>
                  @endforeach
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link  text-capitalize" href="#" role="button" >Sunday workshop</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link  text-capitalize" href="#" role="button" >About</a>
              </li>

              

              
            
            @if (Auth::check())
            
            <li class="nav-item dropdown  ml-5">
              <a class="btn dropdown-toggle text-capitalize" href="#" id="navbarDarkDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                {{Auth::user()->name}}
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" style="z-index: 9999" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><h6 class="dropdown-header">Account</h6></li>
              <li><a class="dropdown-item" href="{{ route('myCourse')}}">My Courses</a></li>
              <li><a class="dropdown-item" href="{{ route('myPayment')}}">My Payments</a></li>
              <li><a class="dropdown-item" href="{{ route('adminCategory')}}">My Profile</a></li>
              <div class="dropdown-divider"></div>
                <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="btn ml-2" aria-current="page" href="{{ route('cart')}}">Cart 
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
              </svg>
            <sup><span class="badge rounded-circle bg-danger">0</span></sup>
            </a></li>
            @endif
            
            </ul>
          
          </div>
        </div>
      </nav>
     @section('content')
       
      @show
    
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
     
  </body>
</html>