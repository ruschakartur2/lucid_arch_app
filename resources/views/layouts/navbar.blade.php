<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div>
        <h2>Blog</h2>
    </div>
    <div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif

                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('posts.index')}}">Posts</a></li>

                @else

                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('home') }}">Home</a></li>

                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('user_posts.index') }}">{{ __('My posts') }}</a></li>

                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('posts.create') }}">{{ __('Add Post') }}</a></li>

                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
