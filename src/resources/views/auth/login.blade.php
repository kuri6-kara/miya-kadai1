@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('nav')
<!-- <ul class="header-nav">
    <li class="header-nav__item"> -->
<a class="header-nav__link" href="/register">register</a>
<!-- </li>
</ul> -->
@endsection

@section('content')
<div class="login-form">
    <h2 class="login-form__heading content__heading">Login</h2>
    <div class="login-form__inner">
        <form class="login-form__form" action="/login" method="post">
            @csrf
            <div class="login-form__group">
                <span class="login-form__label">メールアドレス</span>
                <input class="login-form__input" type="email" name="email" value="{{ old('email') }}" />
                <div class="register-form__error-message">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="login-form__group">
                <span class="login-form__label">パスワード</span>
                <input class="login-form__input" type="password" name="password" />
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