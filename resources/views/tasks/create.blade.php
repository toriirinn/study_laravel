@extends('layouts.app')

@section('content')
    <h1>新しいタスクを追加</h1>
    @if ($errors->any())

       {{--errorメッセージ表示--}}
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--タスク保存--}}
    <form action="{{ route('tasks.store') }}" method="POST">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">内容</label>
            <textarea class="form-control" id="memo" name="memo"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">決定</button>
    </form>
@endsection
