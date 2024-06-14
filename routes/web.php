<?php
   
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



use App\Http\Controllers\TaskController;

//todoリスト一覧画面
Route::get('/','TaskController@index')->name('tasks.index');
//タスク追加画面
Route::get('/tasks/create','TaskController@create')->name('tasks.create');
//追加タスクを保存(データを送信してるのでPOST)
Route::post('/tasks', 'TaskController@store')->name('tasks.store');
//タスク詳細画面(それぞれのタスク)
Route::get('/tasks/{task}','TaskController@show')->name('tasks.show');
//タスク編集画面(それぞれのタスク)
Route::get('/tasks/{task}/edit','TaskController@edit')->name('tasks.edit');
//編集したタスクを保存(更新するのでpatch)
Route::patch('/tasks/{task}','TaskController@update')->name('tasks.update');
//タスク削除画面(削除するのでdelete)
Route::delete('/tasks/{task}','TaskController@destroy')->name('tasks.destroy');


