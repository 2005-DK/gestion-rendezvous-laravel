@extends('layouts.app')
@section('title', 'Connexion')
@section('content')
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    background: #0d1b2a;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    height: 100vh;
    overflow: hidden;
  }

  .container {
    width: 100vw;
    height: 100vh;
    background: #0d1b2a;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
  }

  .ring {
    position: absolute;
    width: 400px;
    height: 400px;
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
    background: repeating-conic-gradient(#00f2ff 0deg 10deg, transparent 10deg 20deg);
    animation: rotate 3s linear infinite;
    mask: radial-gradient(farthest-side, transparent calc(100% - 20px), black 100%);
  }

  @keyframes rotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  .form-box {
    background: #14213d;
    padding: 40px 30px;
    border-radius: 20px;
    box-shadow: 0 0 15px #00f2ff;
    z-index: 1;
    width: 320px;
    text-align: center;
  }

  .form-box h2 {
    color: #00f2ff;
    font-size: 28px;
    margin-bottom: 25px;
  }

  .form-box form {
    display: flex;
    flex-direction: column;
  }

  .form-box input {
    padding: 12px 15px;
    margin-bottom: 20px;
    border: 2px solid #00f2ff;
    border-radius: 25px;
    background: transparent;
    color: #fff;
    font-size: 14px;
    outline: none;
  }

  .form-box input::placeholder {
    color: #ccc;
  }

  .form-box .forgot {
    font-size: 12px;
    color: #ccc;
    text-align: right;
    margin-bottom: 20px;
    display: block;
    text-decoration: none;
  }

  .form-box button {
    background: #00f2ff;
    border: none;
    padding: 12px;
    color: #0d1b2a;
    font-weight: bold;
    border-radius: 25px;
    cursor: pointer;
    font-size: 16px;
    transition: 0.3s;
  }

  .form-box button:hover {
    background: #00cbe6;
  }

  .form-box .signup {
    margin-top: 20px;
    font-size: 14px;
    color: #00f2ff;
    text-decoration: none;
    font-weight: bold;
  }

  .error-message {
    color: #ff4d4d;
    font-size: 13px;
    margin-bottom: 10px;
    text-align: left;
  }
</style>

<div class="container">
  <div class="ring"></div>
  <div class="form-box">
    <h2>Login</h2>

    @if ($errors->any())
      <div class="error-message">
        @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
        @endforeach
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <a href="{{ route('password.request') }}" class="forgot">Forgot your password?</a>
      <button type="submit">Login</button>
      <a href="{{ route('register') }}" class="signup">Signup</a>
    </form>
  </div>
</div>
@endsection
