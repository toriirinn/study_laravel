<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //fillable属性にする
    protected $fillable =['title','memo','completed'];
}
