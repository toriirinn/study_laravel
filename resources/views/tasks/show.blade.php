@extends('layouts.app')

@section('content')
    <h1>詳細</h1>
    <div>
        <strong>タイトル:</strong> {{ $task->title }}
    </div>
    <div>
        <strong>内容:</strong> {{ $task->memo }}
    </div>
    <div>
        <strong>終わった？:</strong> {{ $task->is_completed ? 'Yes' : 'No' }}
    </div>
    <a href="{{ route('tasks.index') }}" class="btn btn-primary">一覧へ</a>
@endsection
