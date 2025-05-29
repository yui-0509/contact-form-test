@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-buttons')
    <div class="header__button">
        <button class="header__button-submit" type="button">logout</button>
    </div>
@endsection

@section('content')
<div class="admin__content">
    <div class="admin-form__heading">
        <h2>Admin</h2>
    </div>
    <form class="form" method="GET" action="/admin">
        <div class="form__group">
            <div class="form__group-content">
                <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
            </div>
            <div class="form__group-content">
                <select name="gender">
                    <option value="">性別</option>
                    <option value="男性">男性</option>
                    <option value="女性">女性</option>
                    <option value="その他">その他</option>
                </select>
            </div>
            <div class="form__group-content">
                <select name="inquiry_type">
                    <option value="">お問い合わせの種類</option>
                    <option value="商品のお届けについて">商品のお届けについて</option>
                    <option value="商品の交換について">商品の交換について</option>
                    <option value="商品トラブル">商品トラブル</option>
                    <option value="ショップへのお問い合わせ">ショップへのお問い合わせ</option>
                    <option value="その他">その他</option>
                </select>
            </div>
            <div class="form__group-content">
                <input type="date" name="date">
            </div>
            <div class="form__button">
                <button class="form__button-search" type="submit">検索</button>
                <a class="form__button-reset" href="/">リセット</a>
            </div>
        </div>
    </form>
    <div class="controls-area">
        <div class="controls-area__export">
            <button class="button--export" type="button">エクスポート</button>
        </div>
        <div class="controls-area__pagination">
            {{ $contacts->links('vendor.pagination.default') }}
        </div>
    </div>
    <div class="admin-table">
        <table class="admin-table__inner">
            <thead>
                <tr class="admin-table__row">
                    <th class="admin-table__header">お名前</th>
                    <th class="admin-table__header">性別</th>
                    <th class="admin-table__header">メールアドレス</th>
                    <th class="admin-table__header">お問い合わせの種類</th>
                    <th class="admin-table__header"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr class="admin-table__row">
                    <td class="admin-table__item">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td class="admin-table__item">{{ $contact->gender }}</td>
                    <td class="admin-table__item">{{ $contact->email }}</td>
                    <td class="admin-table__item">{{ $contact->category->content }}</td>
                    <td class="admin-table__item">
                        <input type="checkbox" id="modal-{{ $contact->id }}" class="modal-toggle" hidden>
                        <div class="modal">
                            <div class="modal-content">
                                <p><strong>お名前</strong>：{{ $contact->last_name }} {{ $contact->first_name }}</p>
                                <p><strong>性別</strong>：{{ $contact->gender }}</p>
                                <p><strong>メールアドレス</strong>：{{ $contact->email }}</p>
                                <p><strong>電話番号</strong>：{{ $contact->tel }}</p>
                                <p><strong>住所</strong>：{{ $contact->address }}</p>
                                <p><strong>建物名</strong>：{{ $contact->building }}</p>
                                <p><strong>お問い合わせの種類</strong>：{{ $contact->category->content }}</p>
                                <p><strong>お問い合わせ内容</strong>：{{ $contact->content }}</p>
                                <label for="modal-{{ $contact->id }}" class="modal-close">✕</label>
                                <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="button--delete">削除</button>
                                </form>
                            </div>
                        </div>
                        <label for="modal-{{ $contact->id }}" class="details-form__button-submit">詳細</label>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection