@extends('layouts.app')

@section('content')
    <h1>ToDo リスト</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">タスクを追加</a>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered mt-2">
        <tr>
            <th>No.</th>
            <th>タイトル</th>
            <th>内容</th>
            <th>終わった？</th>
            <th width="280px">設定</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->memo }}</td>
            <td>{{ $task->completed ? 'Yes' : 'No' }}</td>
            <td>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('tasks.show', $task->id) }}">詳細</a>
                    <a class="btn btn-primary" href="{{ route('tasks.edit', $task->id) }}">編集</a>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
