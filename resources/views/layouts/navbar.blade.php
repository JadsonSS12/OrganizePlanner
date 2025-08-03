<style>
    .nav-item {
        margin: 10px;
        border-radius: 15px;
        border: 1px solid transparent;
        transition: all 0.3s ease;
        padding: 8px 12px;
    }

    .nav-item:hover {
        background-color: aqua;
        border-color: none;
        color: white;
    }
</style>

<nav class="navbar navbar-expand-lg bg-white">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}" style="list-style:none;">
            <span style="color: #12583C; font-weight: 800; font-size: 20px;">
                OrganizeMe
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link btn" href="#" aria-label="Acesse os relatórios">
                        Relatórios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn" href="#" aria-label="Acesse os alertas">
                        Alertas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn" href="#" aria-label="Acesse a home">
                        Home
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
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