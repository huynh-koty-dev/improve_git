<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('todos.index') }}">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav mr-auto">
            <div class="nav-item dropdown">
                <a href="{!! route('user.change_language', ['en']) !!}">{{ __('trans.English') }}</a>
                <a href="{!! route('user.change_language', ['vie']) !!}">{{ __('trans.Vietnamese') }}</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            @if (Auth::user() ?? null)
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">{{ __('trans.Profile') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}">{{ __('trans.Log out') }}</a>
                </div>
            @else
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ __('trans.Log in') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('loginpage') }}">{{ __('trans.Log in') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('register_page') }}">{{ __('trans.Register') }}</a>
                </div>
            @endif
        </div>
        <form class="form-inline my-2 my-lg-0" >
            <input class="form-control mr-sm-2" type="search" placeholder="{{ __('trans.Search') }}" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{ __('trans.Search') }}</button>
        </form>
    </div>
</nav>
