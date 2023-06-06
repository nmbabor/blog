<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrimaryInfo extends Model
{
    use HasFactory;
    
    protected $table='about_company';
    protected $fillable=['company_name','logo','address','mobile_no','email','short_description','description','map_embed','fb_link'];
}
