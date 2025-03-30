@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('content')
<ul class="header-nav">
    @if (Auth::check())
    <li class="header-nav__item">
        <form class="form" action="/logout" method="post">
            @csrf
            <button class="header-nav__button">logout</button>
        </form>
    </li>
    @endif
</ul>

@section('content')
<div class="admin__content">
    <div class="confirm__heading">
        <h2>Admin</h2>
    </div>
    <form class="search-form" action="/admin/search" method="get">
        @csrf
        <div class="search-form__item">
            <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword') }}">
            <select class="search-form__item-select" name="category_id">
                <option value="">性別</option>
                <option value="">男性</option>
                <option value="">女性</option>
                <option value="">その他</option>
            </select>
            <select class="search-form__item-select" name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{ $category['id']}}">{{ $category['content'] }}</option>
                @endforeach
        </div>
</div>
@endsection