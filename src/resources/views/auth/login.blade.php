@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-buttons')
    <div class="header__button">
        <a href="/register" class="header__button-submit">register</a>
    </div>
@endsection

@section('content')
<div class="login__content">
    <div class="login-form__heading">
        <h2>Login</h2>
    </div>
    <form class="form" action="/login" method="post">
        @csrf
        <div class="form__group">
            <label class="form__group-title" for="email">メールアドレス</label>
            <input class="form__group-input" type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" required>
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form__group">
            <label class="form__group-title" for="password">パスワード</label>
            <input class="form__group-input" type="password" name="password" placeholder="例:coachtech1106" required>
            <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form__button">
            <button class="form__button-submit" type="submit">ログイン</button>
        </div>
    </form>
</div>
@endsection