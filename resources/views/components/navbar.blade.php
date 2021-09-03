<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand fw-bold fs-1" href="/">Presto.it</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{route('ads.index')}}">{{__('ui.annunci')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('ads.create')}}">{{__('ui.inserisci_annuncio')}}</a>
          </li>
          @if (Auth::user() && Auth::user()->is_revisor)
          <li class="nav-item"></li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.profile')}}">{{__('ui.lavora')}}</a>
          </li>
          @endif

          <li class="nav-item">
            <form action="{{route('locale','it')}}" method="POST">
                @csrf
                <button class="nav-link" type="submit" style="background-color: transparent; border:none;">
                    <span class="flag-icon flag-icon-it"></span>
                </button>
            </form>
          </li>

          <li class="nav-item">
            <form action="{{route('locale','en')}}" method="POST">
                @csrf
                <button class="nav-link" type="submit" style="background-color: transparent; border:none;">
                    <span class="flag-icon flag-icon-gb"></span>
                </button>
            </form>
          </li>

          <li class="nav-item">
            <form action="{{route('locale','es')}}" method="POST">
                @csrf
                <button class="nav-link" type="submit" style="background-color: transparent; border:none;">
                    <span class="flag-icon flag-icon-es"></span>
                </button>
            </form>
          </li>

        </ul>
        <form action="{{route('search')}}" method="GET" class="d-flex">
          <input name="q" type="text" placeholder="{{__('ui.cerca')}}" class="form-control me-2 mb-3 mb-lg-0" type="search">
        </form>
        <ul class="navbar-nav mb-2 mb-lg-0">
            @guest
            <li class="nav-item">
                <a class="btn btn-outline-light me-2 mb-3 mb-lg-0" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="btn bg-main " href="{{route('register')}}">{{__('ui.registrati')}}</a>
            </li>
            @else
            <li class="nav-item dropdown">
                <a class="dropdown-toggle btn btn-secondary" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                {{-- <li><a class="dropdown-item" href="#">Profilo</a></li> --}}
                @if (Auth::user() && Auth::user()->is_revisor)
                <li><a href="{{route('revisor.home')}}" class="dropdown-item">
                    Inbox
                    <span class="badge badge-pill bg-danger">{{\App\Models\Ad::ToBeRevisionCount()}}</span>
                </a></li>
                @endif
                <li><hr class="dropdown-divider"></li>
                <li><button class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</button></li>
                </ul>
            </li>
            <form id="form-logout" action="{{route('logout')}}" method="POST">
                @csrf
            </form>
            @endguest
        </ul>
      </div>
    </div>
</nav>
