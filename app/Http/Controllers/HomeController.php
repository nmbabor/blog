<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PrimaryInfo;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinPost=Post::where(['status'=>1,'is_pin'=>1])->simplePaginate(10);
        $bigPost=Post::leftJoin('categories','posts.fk_category_id','categories.id')->leftJoin('users','posts.created_by','users.id')->where(['posts.status'=>1,'posts.is_pin'=>2])->orderBy('posts.id','Desc')->select('posts.*','category_name','name')->first();
        $recentPost=Post::leftJoin('categories','posts.fk_category_id','categories.id')->leftJoin('users','posts.created_by','users.id')->where(['posts.status'=>1])->where('posts.id','!=',$bigPost->id)->orderBy('posts.id','Desc')->select('posts.*','category_name','name')->simplePaginate(10);
        $info=PrimaryInfo::first();
        \Session::put('title_msg',$info->company_name);
        \Session::put('metaDescription',$info->short_description);
        \Session::forget('keywords');
        return view('frontend.index',compact('pinPost','recentPost','bigPost','info'));
    }

    public function all(){
        $allPost=Post::leftJoin('categories','posts.fk_category_id','categories.id')->leftJoin('users','posts.created_by','users.id')->where(['posts.status'=>1,'posts.is_pin'=>0])->orderBy('posts.id','Desc')->select('posts.*','category_name','name','categories.link as cat_link')->paginate(10);
        $pageTitle='All Post';
        \Session::put('title_msg','All Post');
        \Session::put('metaDescription','All Blog Post of technicbuzz.');
        \Session::forget('keywords');
        return view('frontend.postList',compact('allPost','pageTitle'));
    }
    
    public function about(){
        $info=PrimaryInfo::first();
        \Session::put('title_msg','About us');
        \Session::put('metaDescription',$info->short_description);
        \Session::forget('keywords');
        return view('frontend.about',compact('info'));
    }    





}
