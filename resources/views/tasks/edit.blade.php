@extends('layouts.app')

@section('content')
    <h1>タスク編集</h1>
    
    @if ($errors->any())
        {{-- エラーメッセージ表示--}}
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- タスク更新実行、そのidを送る --}}
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="title">タイトル:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
        </div>
        <div class="form-group">
            <label for="memo">内容:</label>
            <textarea class="form-control" id="memo" name="memo">{{ $task->memo }}</textarea>
        </div>

        <div class="form-group from-check">
            <input type="checkbox" class="form-check-input" id="completed" name="completed" value="1">{{ $task->completed ? 'checkd' : ''}}
            <label class="form-check-label" for="completed" >終わった！</label>
        </div>

        <button type="submit" class="btn btn-primary">決定</button>
    </form>
@endsection
