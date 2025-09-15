@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #000;
        color: #fff;
    }

    .login-container {
        display: flex;
        background-color: #000;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        overflow: hidden;
        max-width: 900px;
        margin: 50px auto;
    }

    .login-left-side {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 2rem;
    }

    .left-panel {
        background: linear-gradient(135deg, #6c3483, #9b59b6);
        background-image: url('{{ asset("images/montanha2.jpg") }}');
        background-size: cover;
        background-position: bottom;
        background-repeat: no-repeat;
        color: white;
        padding: 60px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        flex: 1;
    }

    .login-form-card {
        background-color: transparent; /* Remove o fundo do card do Bootstrap */
        border: none;
        width: 100%;
        max-width: 400px;
    }

    .login-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 2rem;
        background: linear-gradient(90deg, #9b59b6, #e6b450);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .form-control {
        background-color: #171719;
        border: 1px solid transparent;
        border-image: linear-gradient(90deg, #9b59b6, #e6b450) 1;
        color: #fff;
        padding: 0.75rem 1rem;
        margin-bottom: 1rem;
        border-radius: 8px;
    }

    .form-control:focus {
        background-color: #171719;
        border-color: #9b59b6;
        box-shadow: 0 0 0 0.25rem rgba(155, 89, 182, 0.25);
    }

    .glow-on-hover {
    width: 220px;
    height: 50px;
    border: none;
    outline: none;
    color: #fff;
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
}

.glow-on-hover:before {
    content: '';
    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
    position: absolute;
    top: -2px;
    left:-2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing 20s linear infinite;
    opacity: 100;
    transition: opacity .3s ease-in-out;
    border-radius: 10px;
}

.glow-on-hover:active {
    color: #fff
}

.glow-on-hover:active:after {
    background: transparent;
}

.glow-on-hover:hover:before {
    opacity: 100;
}

.glow-on-hover:after {
    z-index: -1;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #111;
    left: 0;
    top: 0;
    border-radius: 10px;
}

@keyframes glowing {
    0% { background-position: 0 0; }
    50% { background-position: 400% 0; }
    100% { background-position: 0 0; }
}

    .btn-login {
        width: 100%;
        background: linear-gradient(90deg, #9b59b6, #e6b450);
        border: none;
        color: white;
        font-weight: bold;
        padding: 0.75rem;
        border-radius: 8px;
    }

    .register-button {
        margin-top: 20px;
        padding: 10px 40px;
        border: 2px solid white;
        background: transparent;
        color: white;
        border-radius: 20px;
        cursor: pointer;
        font-weight: bold;
    }


</style>

<div class="login-container">
    <div class="login-left-side">
        <div class="login-form-card p-4">
            <h1 class="login-title">Faça seu Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('E-mail') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Senha') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Senha">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember" style="color: #fff">
                            {{ __('Lembrar de mim') }}
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-login glow-on-hover" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
    <div class="left-panel">
        <h2 class="welcome-text">Bem-vindo!</h2>
        <p class="welcome-subtext"> Ainda não tem uma conta?</p>
        <a class="register-button" href="{{route('register')}}">Cadastre-se</a>
    </div>
    <div class="login-right-side d-none d-lg-block"></div>
</div>
@endsection
