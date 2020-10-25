<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">

    <title>Code with sadiQ</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <a class="navbar-brand" href="#">Admin Panel | CWS</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
              <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">My Courses</a></li>
              <li class="nav-item"><a class="nav-link active text-danger" aria-current="page" href="#">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
              </svg></a>
            </li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">My Profile</a></li>

            </ul>
          
          </div>
        </div>
      </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-1 shadow-sm sticky-top">
        <div class="container">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link small" aria-current="page" href="#">Web Designing</a></li>
              <li class="nav-item"><a class="nav-link small" aria-current="page" href="#">Web Development</a></li>
              <li class="nav-item"><a class="nav-link small" aria-current="page" href="#">Data Structure</a></li>
              <li class="nav-item"><a class="nav-link small" aria-current="page" href="#">Data Science</a></li>
              <li class="nav-item"><a class="nav-link small" aria-current="page" href="#">Android Developement</a></li>
              <li class="nav-item"><a class="nav-link small" aria-current="page" href="#">Database</a></li>
              <li class="nav-item"><a class="nav-link small" aria-current="page" href="#">Desktop Software</a></li>
            </ul>
          
          </div>
        </div>
      </nav>

     
    
      @section('content')
          
      @show
    
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
     
  </body>
</html>