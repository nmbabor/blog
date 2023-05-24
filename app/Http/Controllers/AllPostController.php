<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;

class AllPostController extends Controller
{
    public function categeory($link){
    	$data=Category::where('link',$link)->first();
    	$allPost=Post::leftJoin('categories','posts.fk_category_id','categories.id')->leftJoin('users','posts.created_by','users.id')->where(['posts.status'=>1])->where('fk_category_id',$data->id)->orderBy('posts.id','Desc')->select('posts.*','category_name','name','categories.link as cat_link')->paginate(10);
    	$pageTitle=$data->category_name;
        \Session::put('title_msg',$data->category_name);
        \Session::put('metaDescription',$data->description);
        \Session::put('keywords',$data->keywords);
    	return view('frontend.postList',compact('allPost','data','pageTitle'));

    }
    public function single($id,$link){
    	$data=Post::leftJoin('categories','posts.fk_category_id','categories.id')->leftJoin('users','posts.created_by','users.id')->where('posts.id',$id)->select('posts.*','category_name','name','categories.link as cat_link')->first();
    	if($data==null){
    		return redirect()->back();
    	}
    	        $data->update(['hit'=>$data->hit+1]);
        $related=Post::leftJoin('categories','posts.fk_category_id','categories.id')->leftJoin('users','posts.created_by','users.id')->where(['posts.status'=>1])->where('posts.fk_category_id',$data->fk_category_id)->where('posts.id','!=',$data->id)->orderBy('posts.id','Desc')->select('posts.*','category_name','name','categories.link as cat_link')->paginate(5);
        $ogImage=$data->feature_photo;
        \Session::put('title_msg',$data->title);
        \Session::put('metaDescription',$data->meta_description);
        \Session::put('keywords',$data->meta_keywords);
    	return view('frontend.single',compact('data','related','ogImage'));

    }
}
