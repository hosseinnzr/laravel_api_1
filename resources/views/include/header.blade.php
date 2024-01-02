<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">{{config('app.name')}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
          </li>

          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">logout</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('registration')}}">registration</a>
          </li>
          @endauth
        </ul>

        @auth
          <span class="navbar-text">
          username : {{auth()->user()->name}}
          </span>
        @endauth
      </div>
    </div>
  </nav>