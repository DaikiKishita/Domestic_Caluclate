
<header class = "d-flex justify-content-between bg-dark text-white text-center py-1">
    <div></div>

    <div>
        <h1>家計簿アプリ DC</h1>
    </div>

    <div>
        @if (session('is_login'))
            <a href="/logout" class = "text-white">ログアウト</a>
        @endif
    </div>
</header>
