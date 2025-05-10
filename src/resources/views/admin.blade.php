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
<div class="admin">
    <h2 class="admin__heading content__heading">Admin</h2>
    <div class="admin__inner">
        <form class="search-form" action="/search" method="post">
            @csrf
            <input class="search-form__keyword-input" type="text" name="keyword" value="{{ request('keyword')}}" placeholder="名前やメールアドレスを入力してください">
            <div class="search-form__gender">
                <select class="search-form__gender-select" name="gender">
                    <option disabled selected>性別</option>
                    <option value="1" @if( request('gender')==1 ) selected @endif>男性</option>
                    <option value="2" @if( request('gender')==2 ) selected @endif>女性</option>
                    <option value="3" @if( request('gender')==3 ) selected @endif>その他</option>
                </select>
            </div>
            <div class="search-form__category">
                <select class="search-form__category-select" name="category_id">
                    <option disabled selected>お問い合わせの種類</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>
            </div>
            <input class="search-form__date" type="date" name="date">
            <div class="search-form__actions">
                <input class="search-form__search-btn btn" type="submit" value="検索">
                <input class="search-form__reset-btn btn" type="submit" value="リセット" name="reset">
            </div>
        </form>
        <!-- <div class="col-md-4 mb-4">
            <a class="link" href="/">
                <div class="card">
                    <img src="{{ asset('/storage/' . $contacts->image_file) }}" alt="{{ $contact->first_name }}">
                    <input type="hidden" name="image_file" value="{{ $contact['image_file']}}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $contact->first_name }}</h5>
                        <p class="card-text">{{ $contact->email }} </p>
                    </div>
                </div>
            </a>
        </div> -->

        <!-- {{ $contacts->links() }} -->
        {{ $contacts->links('vendor.pagination.semantic-ui') }}

        <table class="admin__table">
            <tr class="admin__row">
                <th class="admin__label">お名前</th>
                <th class="admin__label">性別</th>
                <th class="admin__label">メールアドレス</th>
                <th class="admin__label">お問い合わせの種類</th>
                <th class="admin__label"></th>
            </tr>
            @foreach($contacts as $contact)
            <tr class="admin__row">
                <td class="admin__data">{{$contact->first_name}}{{$contact->last_name}}</td>
                <td class="admin__data">
                    @if($contact->gender == 1)
                    男性
                    @elseif($contact->gender == 2)
                    女性
                    @else
                    その他
                    @endif
                </td>
                <td class="admin__data">{{$contact->email}}</td>
                <td class="admin__data">{{$contact->category->content}}</td>
                <td class="admin__data">
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
                                <label class="modal-form__label" for="">お名前</label>
                                <p>{{$contact->first_name}}{{$contact->last_name}}</p>
                            </div>

                            <div class="modal-form__group">
                                <label class="modal-form__label" for="">性別</label>
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
                                <label class="modal-form__label" for="">メールアドレス</label>
                                <p>{{$contact->email}}</p>
                            </div>

                            <div class="modal-form__group">
                                <label class="modal-form__label" for="">電話番号</label>
                                <p>{{$contact->tell}}</p>
                            </div>

                            <div class="modal-form__label" class="modal-form__group">
                                <label for="">住所</label>
                                <p>{{$contact->address}}</p>
                            </div>

                            <div class="modal-form__group">
                                <label class="modal-form__label" for="">お問い合わせの種類</label>
                                <p>{{$contact->category->content}}</p>
                            </div>

                            <div class="modal-form__group">
                                <label class="modal-form__label" for="">お問い合わせ内容</label>
                                <p>{{$contact->detail}}</p>
                            </div>
                            <input type="hidden" name="id" value="{{ $contact->id }}">
                            <input class="modal-form__delete-btn btn" type="submit" value="削除">
                        </form>
                    </div>
                    <a href="#" class="modal__close">×</a>
                </div>
            </div>
            @endforeach
        </table>
    </div>
</div>
@endsection