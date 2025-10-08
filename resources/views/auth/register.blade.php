@extends('layouts.auth')

@section('title', 'Înregistrare - Laravel App')

@section('content')
<h2>Înregistrare</h2>

@if ($errors->any())
    <div class="error">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf
    
    <div class="form-group">
        <label for="name">Nume:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="password">Parolă:</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirmă parola:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>

    <button type="submit" class="btn">Înregistrare</button>
</form>

<div class="link">
    <a href="{{ route('login') }}">Ai deja cont? Autentifică-te aici</a>
</div>
@endsection