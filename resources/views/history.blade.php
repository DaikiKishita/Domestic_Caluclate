@extends('layouts.layout')
@section('content')
<div class="d-flex justify-content-end my-2">
    <form action = "/history/search" method= "post" class ="d-flex mx-3">
        @csrf
        <select name = "type" class = "mx-1">
            @foreach ($types as $type)
                <option value = "{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary mx-1">検索</button>
    </form>
    <form action = "/history/store" method= "post">
        @csrf
        <button type="button" class="btn btn-primary mx-2" data-bs-toggle="offcanvas" data-bs-target="#historyStore">新規作成</button>
    </form>
</div>

@if ($histories->isEmpty())
    <div class = "text-center">
        <h4>履歴がありません</h4>
    </div>
@else
<div class = "text-center">
    <div class="d-flex justify-content-between">
    <div></div>
    <div><h4>履歴</h4></div>
    <div class="d-flex mx-2"><h4 class = "">今月の合計金額:{{$current_month_total}}円</h4></div>
    </div>  
    <div class = "px-2">
        <table class = "table table-hover table-border border border-dark">
            <thead>
                <tr>
                    <th scope="col">用途</th>
                    <th scope="col">カテゴリ</th>
                    <th scope="col">金額</th>
                    <th scope="col">日付</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                    <tr>
                        <td scope='row'>{{ $history->comment }}</td>
                        <td scope='row'>{{ $history->type->name}}</td>
                        <td scope='row'>{{ $history->amount }}円</td>
                        <td scope='row'>{{ $history->created_at }}</td>
                        <td scope="row">
                            <form action="/history/destroy" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $history->id }}">
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<!-- 履歴登録モーダル -->
<div class ="offcanvas offcanvas-end" id = "historyStore" aria-labelledby="historyStoreLabel" aria-hidden="true" tabindex="-1">
    <div class="offcanvas-dialog">
        <div class="offcanvas-content">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="historyStoreLabel">履歴登録</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form method="POST" action="/history/store">
                    @csrf
                    <div class="mb-3">
                        <label for="comment" class="form-label">用途</label>
                        <input type="text" class="form-control" id="comment" name="comment" required>
                    </div>
                    <div class="mb-3">
                        <label for="type_id" class="form-label">カテゴリ</label>
                        <select name = "type_id" class = "form-select mx-1">
                            @foreach ($types as $type)
                                <option value = "{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">金額</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class = "text-center">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection