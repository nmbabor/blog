<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function dashboard()
    {
    	$posts=Post::leftJoin('categories','posts.fk_category_id','categories.id')->leftJoin('sub_categories','posts.fk_sub_category_id','sub_categories.id')->leftJoin('users','posts.created_by','users.id')->select('posts.*','category_name','sub_category_name','name as user_name')->orderBy('posts.id','DESC')->paginate(10);
        return view('backend.index',compact('posts'));
        
    }

}
