<style>
    .nav-item {
        margin: 10px;
        border-radius: 15px;
        border: 1px solid;
        transition: all 0.3s ease;
        padding: 8px 12px;
        color: white;
    }

    .nav-item:hover {
        background-color: #5E81AC;
        border-color: none;
        color: white;
    }

    .nav-item.active-nav-item {
        background-color: #81A1C1;
        transition: all 0.3s ease;
        color: #4C566A;
        border-radius: 15px;
    }
</style>

<nav class="navbar navbar-expand-lg" style="background-color: #2E3440">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}" style="list-style:none;">
            <img src="{{ asset('images/organizeMe.jpg') }}" alt="Logo OrganizeMe" style="height: 40px; width: auto;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            @auth
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link btn" href="{{ route('relatories.dashboard') }}" aria-label="Acesse os relatórios" style="color: white">
                            Relatórios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" href="{{ route('remembers.index') }}" aria-label="Acesse os alertas" style="color: white">
                            Alertas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('atividades.index') }}">
                            Agenda
                        </a>
                    </li>
                </ul>
            @endauth
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item" >
                            <a class="nav-link" style="color: white" href="{{ route('login') }}">{{ __('Login') }} </a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" style="color: white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->nome }}
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