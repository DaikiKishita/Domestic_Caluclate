@extends('layouts.home_layout')
@section('content')
<div class="d-flex flex-column justify-content-center align-items-center bg-dark-subtle py-2">
    <h4>新規登録</h4>
    <form method="POST" action="/user/store">
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
            <p id = "warning_message" class = "text-danger"></p>
            <label for="password_confirmation" class="form-label">パスワード（確認）</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id = "submit_button">新規登録</button>
        </div>
    </form>
    <div class="text-center mt-3">
        <a href="/login">ログインはこちら</a>
    </div>
</div>
<script>
    let confirmation_password = document.getElementById('password_confirmation');
    let warning_message = document.getElementById('warning_message');

    // 新規登録ボタンを無効にする
    let submit_button = document.getElementById('submit_button');
    submit_button.disabled = true;

    // パスワードと確認用パスワードが一致しているか確認
    confirmation_password.addEventListener('change', function() {

        let password = document.getElementById('password').value;
        let password_confirmation = confirmation_password.value;

        if (password !== password_confirmation) {
            warning_message.innerText = 'パスワードが一致しません';
        } else {
            warning_message.innerText = '';
            submit_button.disabled = false;
        }
    });
</script>
@endsection