
<header class = "d-flex justify-content-between bg-dark text-white text-center py-1">
    <div></div>

    <div>
        <h1>家計簿アプリ DC</h1>
    </div>

    <div class = "d-flex justify-content-center align-items-center">
        @if ($is_login)
            <form action = "/user/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-outline-light">ログアウト</button>
            </form>
        @endif
    </div>
</header>
