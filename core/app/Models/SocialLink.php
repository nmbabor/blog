<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialLink extends Model
{
    use HasFactory;
    
    protected $table='social_links';
    protected $fillable=['name','link','status','serial_num','icon_class'];
}
