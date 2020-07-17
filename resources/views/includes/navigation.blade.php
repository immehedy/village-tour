<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="/">Village tour</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{route('index')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('about')}}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contact')}}">Contact</a>
        </li>

        @if(Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
        </li>
        <li class="nav-item">
          <form id="logout-form" action="{{route('logout')}}" method="post">@csrf</form>
          <a class="nav-link" href="#" onclick="document.getElementById('logout-form').submit();">Logout</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Register</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
