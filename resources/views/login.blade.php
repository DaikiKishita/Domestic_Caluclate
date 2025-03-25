@extends('layouts.home_layout')
@section('content')
@if (isset($status))
    <div class = 'd-flex justify-content-center align-items-center'>
        <p>{{$status}}</p>
    </div>
@endif
<div class = "d-flex flex-column justify-content-center align-items-center bg-dark-subtle py-4">
    <h4>ログイン</h4>
    <form method="POST" action="/user/login">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">パスワード</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">ログイン状態を保存する</label>
        </div> -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">ログイン</button>
        </div>
    </form>
    <div class = "text-center mt-3">
        <a href="/register">新規登録はこちら</a>
    </div>
</div>
@endsection