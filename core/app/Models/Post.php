<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    
    protected $table='posts';
    protected $fillable=['title','feature_photo','description','meta_description','status','created_by','updated_by','link','meta_keywords','fk_category_id','fk_sub_category_id','visiting_count','tags','is_approved','approved_by','is_pin','hit'];
}
