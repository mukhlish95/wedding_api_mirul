@section('head')
    @parent
    <style>
        /* :root{
            font-size: 32px;
        } */

      .logo-container i {
        font-size: 2.5rem;
        color: black;
      }

      .navbar-position {
        position: relative;
      }
      .navbar{
          margin-top:0;
          margin-bottom:0;
      }

      .active {
        font-weight: bold;
        color: black;
      }

    </style>

@endsection


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    {{-- small screen nav --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

      {{-- big screen nav --}}
      <div class="d-flex flex-column">
      </div>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        {{-- logo --}}
        <div class="d-flex flex-column logo-container">
          <i class="fa-solid fa-book-open-reader align-self-center" style="color: black"></i>
        </div>

        {{-- navigation button --}}
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-uppercase">
          {{-- <li>
            <a class="nav-link {{ Route::currentRouteNamed('dashboard') ? 'active' : ''}}" aria-current="page" href="{{ route('dashboard') }}">Home</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteNamed('rsvp.*') ? 'active' : '' }}" href="{{ route('rsvp.index') }}">Rsvp</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteNamed('wish.*') ? 'active' : '' }}" href="{{ route('wish.index') }}">Wish</a>
          </li>
        </ul>

        {{-- button logout --}}
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit">
            Log Out
          </button>
        </form>
      </div>
  </div>
</nav>
<div class="flex py-1 px-2" style="background-color: #f8f9fa; border-top: 1px solid rgba(0, 0, 0, 0.438)">
  <i>Welcome, {{ Auth::user()->name }} </i> 
</div>
