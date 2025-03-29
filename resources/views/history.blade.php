@extends('layouts.layout')
@section('content')
<div class="d-flex justify-content-end my-2">
    <form action = "/history/search" method= "post" class ="d-flex mx-3">
        @csrf
        <select name = "types" class = "mx-1">
            <option value = "">全て</option>
            @foreach ($types as $type)
                <option value = "{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
        <input type="date" name="date" class="form-control mx-1"> 
        ~
        <input type="date" name="date" class="form-control mx-1"> 
        <button type="submit" class="btn btn-primary mx-auto px-auto" style="width: 50%">検索</button>
    </form>
    <form action = "/history/store" method= "post">
        @csrf
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#historyStore">新規作成</button>
    </form>
</div>

<div class = "text-center">
    <h4>履歴</h4>
    <div class = "px-2">
        <table class = "table table-secondary table-hover table-bordered border border-dark">
            <thead>
                <tr>
                    <th scope="col">日付</th>
                    <th scope="col">用途</th>
                    <th scope="col">カテゴリ</th>
                    <th scope="col">金額</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                    <tr>
                        <td scope='row'>{{ $history->created_at }}</td>
                        <td scope='row'>{{ $history->comment }}</td>
                        <td scope='row'>{{ $history->type->name}}</td>
                        <td scope='row'>{{ $history->amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- 履歴登録モーダル -->
<div class ="modal fade" id = "historyStore" aria-labelledby="historyStoreLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="historyStoreLabel">履歴登録</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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