@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="thanks__content">
    <div class="thanks__center">
        <h2>お問い合わせありがとうございました</h2>
    </div>
    <div class="form__button">
        <button type="button" onclick="location.href='{{ route('/') }}' ">HOME</button>
    </div>
</div>
@endsection