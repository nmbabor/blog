<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table='sub_categories';
    protected $fillable=['sub_category_name','status','serial_num','fk_category_id','created_by','sub_link','sub_description','sub_keywords'];

    static function allTags(){
    	$subTags=SubCategory::where('status',1)->pluck('sub_keywords');
        $tags='';
        foreach($subTags as $tag){
           $tag= str_replace(',','","', $tag);
            if($tags==''){
                $tags.='"'.$tag;
            }else{
                $tags.='","'.$tag;
            }
        }
        $tags=$tags.'"';
        $tags=str_replace('" ', '"', $tags);
        $tags=str_replace(' " ', '"', $tags);
        $tags=str_replace(' "', '"', $tags);
        return $tags;
    }
}
