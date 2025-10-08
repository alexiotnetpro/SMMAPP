@extends('layouts.auth')

@section('title', 'Login - Laravel App')

@section('content')
<h2>Autentificare</h2>

@if ($errors->any())
    <div class="error">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>

    <div class="form-group">
        <label for="password">Parolă:</label>
        <input type="password" id="password" name="password" required>
    </div>

    <button type="submit" class="btn">Autentificare</button>
</form>

<div class="link">
    <a href="{{ route('register') }}">Nu ai cont? Înregistrează-te aici</a>
</div>
@endsection