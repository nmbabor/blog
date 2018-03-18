<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $fillable=['category_name','serial_num','description','keywors','status','created_by','link'];
}
