@extends('layouts.app')

@section('content')
<div class="registration-container">

    
    <div class="right-panel">
        <h2 class="form-title">criar conta</h2>
        <p class="social-subtext">registre-se com seu email</p>
        <form method="POST" action="{{ route('register') }}" class="registration-form">
            @csrf
            
             <div class="input-group">
                <label for="nome" class="input-icon"><i class="fas fa-user"></i></label>
                <input id="nome" type="text" class="form-input" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus placeholder="Nome">
            </div>

            <div class="input-group">
                <label for="email" class="input-icon"><i class="fas fa-envelope"></i></label>
                <input id="email" type="email" class="form-input" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
            </div>

            <div class="input-group">
                <label for="password" class="input-icon"><i class="fas fa-lock"></i></label>
                <input id="password" type="password" class="form-input" name="password" required autocomplete="new-password" placeholder="Senha">
            </div>

             <div class="input-group">
                        <label for="password" class="input-icon"><i class="fas fa-lock"></i></label>
                        <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme a senha">
                        
             </div>
            
           <button type="submit" class="register-button">
                                    {{ __('Register') }}
                                </button>
        </form>
    </div>
    <div class="left-panel">
        <h2 class="welcome-text">Bem Vindo!</h2>
        <p class="welcome-subtext">Para se manter conectado conosco<br>por favor logue com suas informações pessoais</p>
        <a class="login-button" href="{{route('login')}}">ENTRAR</a>
    </div>
</div>

<style>
    /* Aqui é onde você adicionaria o CSS para replicar a imagem */
    .registration-container {
        display: flex;
        background-color: #000;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        overflow: hidden;
        max-width: 900px;
        margin: 50px auto;
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
    .welcome-text {
        font-size: 2.5rem;
        font-weight: bold;
    }
    .welcome-subtext {
        font-size: 1rem;
        margin-top: 10px;
        line-height: 1.5;
    }
    .login-button {
        margin-top: 20px;
        padding: 10px 40px;
        border: 2px solid white;
        background: transparent;
        color: white;
        border-radius: 20px;
        cursor: pointer;
        font-weight: bold;
    }
    .right-panel {
        padding: 60px;
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .form-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        background: linear-gradient(90deg, #9b59b6, #e6b450); 
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .social-icons {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
    }
    .social-icon {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border: 1px solid #ddd;
        border-radius: 50%;
        color: #555;
        font-size: 1.2rem;
    }
    .social-subtext {
        color: #888;
        margin-bottom: 20px;
    }
    .registration-form {
        width: 100%;
    }
    .input-group {
        display: flex;
        align-items: center;
        background-color: #e8e8e8;
        border-radius: 5px;
        margin-bottom: 15px;
        padding: 5px;
    }
    .input-icon {
        color: #888;
        padding: 0 10px;
    }
    .form-input {
        flex-grow: 1;
        border: none;
        background: transparent;
        padding: 10px;
        outline: none;
        font-size: 1rem;
    }
    .form-input::placeholder {
        color: #aaa;
    }
    .register-button {
        width: 100%;
        padding: 15px;
        border: none;
        background: linear-gradient(90deg, #9b59b6, #e6b450); 
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        border-radius: 25px;
        margin-top: 20px;
        cursor: pointer;
        transition: background 0.3s;
    }
    .register-button:hover {
        background: #e6b450;
    }
</style>
@endsection