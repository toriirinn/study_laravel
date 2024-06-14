<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   //todo一覧画面
    public function index()
    {
        //$tasksにTaskのすべての情報を代入
        $tasks = Task::all();

        //task.indexを返す、テーブル情報を連想配列で返す 
        return view('tasks.index',compact('tasks'));
      //return view('tasks.index',['tasks'=>$tasks]);
    }

   //タスク追加画面
    public function create()
    {
        //task.createを表示
        return view('tasks.create');
    }

   
    //データベースにタスク内容を保存するメソッド
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            //タイトルは必須かつmax255
            'title' => 'required |max:255'
        ]);
        //追加タスクを保存
        Task::create($request->all());
        //タスク一覧(task.index)にいく
        return redirect()->route('tasks.index')
                        //successメッセージ表示
                         ->with('success','タスクを追加しました。');
    }

   
    //タスク詳細画面
    public function show(Task $task)
    //特定のtask(URLで1など)を取ってくる
    {
        //task.showを返す、タスク情報を連想配列で返す
    //  return view('tasks.show,['task=>$task]); 
        return view('tasks.show',compact('task'));
    }

    //タスク編集画面
    public function edit(Task $task)
    {
    //  return view('tasks.edit',['task=>$task']); 
        return view('tasks.edit',compact('task'));
       
}
    

   //タスクを編集保存して、indexに戻る
    public function update(Request $request, Task $task)
    {
        //検証ルールに一致しないとエラー
        $request->validate([
            //titleは必須
            'title' => 'required| max:300',
            'completed' => 'required | boolean'
        ]);

        //リクエストデータを更新
        $task->update($request->all());
        //task.indexにリダイレクト
        return redirect()->route('tasks.index')
                         ->with('success','タスクを編集しました。');

    }

   //タスクの削除
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
                         ->with('success','タスクを削除しました。');
    }
}
