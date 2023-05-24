<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PagePhoto extends Model
{
    use HasFactory;
    
    protected $table='page_photo';
    protected $fillable=['photo','fk_page_id'];
}
