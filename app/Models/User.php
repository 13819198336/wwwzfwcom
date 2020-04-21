<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //设置添加的字段
    //拒绝不添加的字段
    protected $guarded = [];
}
