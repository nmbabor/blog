<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubSubMenu extends Model
{
    use HasFactory;
    
    protected $table='sub_sub_menu';
    protected $fillable=['name','url','status','serial_num','fk_sub_menu_id'];
}
