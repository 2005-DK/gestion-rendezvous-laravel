@extends('layouts.app')
@section('title', 'Inscription')
@section('content')
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    background: #1a1a2e;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    height: 100vh;
    overflow: hidden;
  }

  .container {
    width: 100vw;
    height: 100vh;
    background: #1a1a2e;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
  }

  .ring {
    position: absolute;
    width: 420px;
    height: 420px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .ring::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: repeating-conic-gradient(#ff4d9d 0deg 10deg, transparent 10deg 20deg);
    animation: rotate 4s linear infinite;
    mask: radial-gradient(farthest-side, transparent calc(100% - 20px), black 100%);
  }

  @keyframes rotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  .form-box {
    background: #0f0f1c;
    padding: 45px 35px;
    border-radius: 20px;
    box-shadow: 0 0 20px #ff4d9d;
    z-index: 1;
    width: 350px;
    text-align: center;
  }

  .form-box h2 {
    color: #ff4d9d;
    font-size: 30px;
    margin-bottom: 30px;
  }

  .form-box form {
    display: flex;
    flex-direction: column;
  }

  .form-box input {
    padding: 13px 16px;
    margin-bottom: 18px;
    border: 2px solid #ff4d9d;
    border-radius: 25px;
    background: transparent;
    color: #ffffff;
    font-size: 15px;
    outline: none;
  }

  .form-box input::placeholder {
    color: #bbb;
    font-style: italic;
  }

  .form-box button {
    background: #ff4d9d;
    border: none;
    padding: 13px;
    color: #0f0f1c;
    font-weight: bold;
    border-radius: 25px;
    cursor: pointer;
    font-size: 16px;
    transition: 0.3s;
  }

  .form-box button:hover {
    background: #e63c87;
  }

  .form-box .login-link {
    margin-top: 20px;
    font-size: 14px;
    color: #ff4d9d;
    text-decoration: none;
    font-weight: bold;
  }

  .error-message {
    color: #ff4d4d;
    font-size: 13px;
    margin-bottom: 12px;
    text-align: left;
  }
</style>

<div class="container">
  <div class="ring"></div>
  <div class="form-box">
    <h2>Créer un nouveau compte</h2>

    @if ($errors->any())
      <div class="error-message">
        @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
        @endforeach
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf
      <input type="text" name="name" value="{{ old('name') }}" placeholder="Entrez votre nom complet" required>
      <input type="email" name="email" value="{{ old('email') }}" placeholder="Entrez votre adresse e-mail" required>
      <input type="password" name="password" placeholder="Choisissez un mot de passe" required>
      <input type="password" name="password_confirmation" placeholder="Confirmez le mot de passe" required>
      <button type="submit">S'inscrire</button>
      <a href="{{ route('login') }}" class="login-link">Vous avez déjà un compte ? Connectez-vous</a>
    </form>
  </div>
</div>
@endsection
