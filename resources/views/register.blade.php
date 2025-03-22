@extends('layouts.layout')
@section('content')
<div class="d-flex flex-column justify-content-center align-items-center bg-dark-subtle py-4">
    <h4>新規登録</h4>
    <form method="POST" action="/user/new">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">ユーザー名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">パスワード</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">パスワード（確認）</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">新規登録</button>
        </div>
    </form>
</div>
@endsection