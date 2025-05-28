@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm-form__heading">
        <h2>Confirm</h2>
    </div>
    <form class="form" action="/store" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <p>{{ $data['last_name'] }} {{ $data['first_name'] }}</p>
                        <input type="hidden" name="last_name" value="{{ $data['last_name'] }}">
                        <input type="hidden" name="first_name" value="{{ $data['first_name'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <p>{{ $data['gender'] }}</p>
                        <input type="hidden" name="gender" value="{{ $data['gender'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <p>{{ $data['email'] }}</p>
                        <input type="hidden" name="email" value="{{ $data['email'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <p>{{ $data['tel'][0] }}{{ $data['tel'][1] }}{{ $data['tel'][2] }}</p>
                        <input type="hidden" name="tel[0]" value="{{ $data['tel'][0] }}">
                        <input type="hidden" name="tel[1]" value="{{ $data['tel'][1] }}">
                        <input type="hidden" name="tel[2]" value="{{ $data['tel'][2] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <p>{{ $data['address'] }}</p>
                        <input type="hidden" name="address" value="{{ $data['address'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <p>{{ $data['building'] }}</p>
                        <input type="hidden" name="building" value="{{ $data['building'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <p>{{ $data['inquiry_type'] }}</p>
                        <input type="hidden" name="detail" value="{{ $data['inquiry_type'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <p>{{ $data['message'] }}</p>
                        <input type="hidden" name="message" value="{{ $data['message'] }}">
                    </td>
                </tr>
            </table>
        </div>

        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
            <a href="/contact" class="form__button-edit">修正</a>
        </div>
    </form>
</div>
@endsection