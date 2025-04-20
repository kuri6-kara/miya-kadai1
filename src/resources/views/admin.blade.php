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
<div>
    <h2>Admin</h2>
    <div>
        <form action="/search" method="post">
            @csrf
            <div>
                <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
                <div>
                    <select name="gender">
                        <option disabled selected>性別</option>
                        <option value="">男性</option>
                        <option value="">女性</option>
                        <option value="">その他</option>
                    </select>
                </div>
                <div>
                    <select name="category_id">
                        <option disabled selected>お問い合わせの種類</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->content }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input type="date" name="date">
                </div>
            </div>
            <input type="submit" value="検索">
            <input type="submit" value="リセット">
        </form>
    </div>
    <table>
        <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
        </tr>
        @foreach($contacts as $contact)
        <tr>
            <td>{{$contact->first_name}}{{$contact->last_name}}</td>
            <td>
                @if($contact->gender == 1)
                男性
                @elseif($contact->gender == 2)
                女性
                @else
                その他
                @endif
            </td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->category_id}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection