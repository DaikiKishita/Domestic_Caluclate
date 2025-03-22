<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>家計簿アプリ DC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    body {
        background: repeating-linear-gradient(
            45deg,          /* 斜めのストライプ */
            #f8f9fa,        /* 薄いグレー */
            #f8f9fa 10px,   /* ストライプの幅 */
            #dee2e6 10px,   /* 濃いグレー */
            #dee2e6 20px    /* ストライプの間隔 */
        );
        height: 100vh; /* 画面全体をカバー */
        margin: 0;
    }
</style>
</head>
<body>
    <!-- ヘッダー -->
    @include('components.header')

    <!-- コンテンツ部分 -->
    @yield('content')

    <!-- フッター -->
    @include('components.footer')
</body>
</html>