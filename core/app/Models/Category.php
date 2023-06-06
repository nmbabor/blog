<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    
    protected $table='categories';
    protected $fillable=['category_name','serial_num','description','keywors','status','created_by','link'];
}
