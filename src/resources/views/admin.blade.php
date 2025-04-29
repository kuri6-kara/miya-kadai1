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
                <input type="text" name="keyword" value="{{ request('keyword')}}" placeholder="名前やメールアドレスを入力してください">
                <div>
                    <select name="gender">
                        <option disabled selected>性別</option>
                        <!-- <option value="">男性</option>
                        <option value="">女性</option>
                        <option value="">その他</option> -->
                        <!-- <option value="男性" {{ request('gender')=='男性' ? 'selected' : ''}}>男性</option>
                        <option value="女性" {{ request('gender')=='女性' ? 'selected' : ''}}>女性</option>
                        <option value="その他" {{ request('gender')=='その他' ? 'selected' : ''}}>その他</option> -->
                        <option value="1" @if( request('gender')==1 ) selected @endif>男性</option>
                        <option value="2" @if( request('gender')==2 ) selected @endif>女性</option>
                        <option value="3" @if( request('gender')==3 ) selected @endif>その他</option>
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
            <input type="submit" value="リセット" name="reset">
        </form>
    </div>
    {{ $contacts->links() }}
    <table>
        <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
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
            <td>{{$contact->category->content}}</td>
            <td>
                <!-- <a href="" 詳細></a> -->
                <a href="#{{$contact->id}}">詳細</a>
            </td>
        </tr>

        <!-- <div class="modal__wrapper" id="{{$contact->id}}">
            <div class="modal__window"> -->
        <div class="modal" id="{{$contact->id}}">
            <a href="#!" class="modal-overlay"></a>
            <div class="modal__inner">
                <div class="modal__content">
                    <form action="/delete" method="post">
                        @csrf
                        <div class="modal-form__group">
                            <label for="">お名前</label>
                            <p>{{$contact->first_name}}{{$contact->last_name}}</p>
                        </div>

                        <div class="modal-form__group">
                            <label for="">性別</label>
                            <p>
                                @if($contact->gender == 1)
                                男性
                                @elseif($contact->gender == 2)
                                女性
                                @else
                                その他
                                @endif
                            </p>
                        </div>

                        <div class="modal-form__group">
                            <label for="">メールアドレス</label>
                            <p>{{$contact->email}}</p>
                        </div>

                        <div class="modal-form__group">
                            <label for="">電話番号</label>
                            <p>{{$contact->tell}}</p>
                        </div>

                        <div class="modal-form__group">
                            <label for="">住所</label>
                            <p>{{$contact->address}}</p>
                        </div>

                        <div class="modal-form__group">
                            <label for="">お問い合わせの種類</label>
                            <p>{{$contact->category->content}}</p>
                        </div>

                        <div class="modal-form__group">
                            <label for="">お問い合わせ内容</label>
                            <p>{{$contact->detail}}</p>
                        </div>
                        <input type="hidden" name="id" value="{{ $contact->id }}">
                        <input type="submit" value="削除">
                    </form>
                </div>
                <a href="#" class="modal__close">×</a>
            </div>
        </div>
        @endforeach
    </table>
</div>
@endsection