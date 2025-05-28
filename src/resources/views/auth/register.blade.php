@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header-buttons')
    <div class="header__button">
        <a href="/login" class="header__button-submit">login</a>
    </div>
@endsection

@section('content')
<div class="login__content">
    <div class="login-form__heading">
        <h2>Register</h2>
    </div>
    <form class="form" action="/register" method="post">
        @csrf
        <div class="form__group">
            <label class="form__group-title" for="name">お名前</label>
            <input class="form__group-input" type="text" name="name"  value="{{ old('name') }}" placeholder="例:山田  太郎" required >
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form__group">
            <label class="form__group-title" for="email">メールアドレス</label>
            <input class="form__group-input" type="email" name="email" value="{{ old('email') }}" placeholder="例:test@example.com" required >
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
            <button class="form__button-submit" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection