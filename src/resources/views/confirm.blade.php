@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <form class="form" action="/thanks" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                        <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <input type="text" name="gender" value="{{ $contact['gender'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input type="tel" name="tel1" value="{{ $contact['tel1'] }}" readonly />
                        <input type="tel" name="tel2" value="{{ $contact['tel2'] }}" readonly />
                        <input type="tel" name="tel3" value="{{ $contact['tel3'] }}" readonly />
                        <input type="hidden" name="tel" value="{{ $contact['tel1'] . $contact['tel2'] . $contact['tel3'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <input type="text" name="content" value="{{ $category['content'] }}" readonly />
                        <input type="hidden" name="category_id" value="{{ $category['id'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ商品</th>
                    <td class="confirm-table__text">
                        <input type="text" name="item_content" value="{{ $item->content}}" readonly />
                        <input type="hidden" name="item_id" value="{{ $item->id }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">どこで知りましたか？</th>
                    <td class="confirm-table__text">
                        @foreach($channels as $channel)
                        <input type="text" name="channel_contents[]" value="{{ $channel->content }}" readonly />
                        <!-- <input type="text" name="channel_ids[]" value="{{ $channel->id }}" readonly /> -->
                        <input type="hidden" name="channel_ids[]" value="{{ $channel->id }}" />
                        @endforeach
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
        </div>
        <div class="form__button">
            <a class="correction__link" href="/">
                修正
            </a>
        </div>
    </form>
</div>
@endsection