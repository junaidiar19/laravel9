<nav class="navbar navbar-expand-md navbar-light shadow-sm bg-white">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('home')) ? 'active' : '' }}" href="{{ route('home') }}">Home <span class="visually-hidden">(current)</span></a>
                </li>
                @if (Auth::check())

                    @if (Auth::user()->roleUser())
                        <li class="nav-item">
                            <a class="nav-link {{ (@$active == 'blog') ? 'active' : '' }}" href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->routeIs('contact')) ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                        </li>
                    @endif

                    @if (Auth::user()->roleAdmin())
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->routeIs('users')) ? 'active' : '' }}" href="{{ route('users') }}">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->routeIs('books')) ? 'active' : '' }}" href="{{ route('books.index') }}">Buku</a>
                    </li>
                    @endif

                @endif
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="btn btn-light me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>