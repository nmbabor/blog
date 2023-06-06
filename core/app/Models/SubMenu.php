<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubMenu extends Model
{
    use HasFactory;
    
    protected $table='sub_menu';
    protected $fillable=['name','url','status','serial_num','fk_menu_id'];
}
