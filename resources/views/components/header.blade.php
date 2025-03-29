
<header class = "d-flex justify-content-between bg-dark text-white text-center py-1">
    <div>
        
    </div>

    <div>
        @if (isset($is_login))
            <h1>{{ $user_name }}さんの家計簿</h1>
        @else
            <h1>家計簿アプリ DC</h1>
        @endif
    </div>

    <div class = "d-flex justify-content-center align-items-center">
        @if (isset($is_login))
            <form action = "/user/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-outline-light">ログアウト</button>
            </form>
        @endif
    </div>
</header>
