@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<header class="header">
    <div class="header__inner">
        <a class="header__logo" href="/">
            FashionablyLate
        </a>
        <nav>
            <ul class="header-nav">
                @if (Auth::check())
                <li class="header-nav__item">
                    <form class="form" action="/logout" method="post">
                        @csrf
                        <button class="header-nav__button">ログアウト</button>
                    </form>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</header>