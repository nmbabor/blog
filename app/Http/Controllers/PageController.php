<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Page;
use App\Model\PagePhoto;
class PageController extends Controller
{
    public function show($link){
    	$value=array('link'=>$link);
        $validator = \Validator::make($value,[
                'link' => 'required|exists:page,link',
        ]);

        if($validator->fails()){
            return redirect()->back();
        }
    	$page=Page::where('link',$link)->first();
        $pages=Page::where('status',1)->pluck('name','link');
    	$pagePhoto=PagePhoto::where('fk_Page_id',$page->id)->get();
    	\Session::put('title_msg',$page->name);
        \Session::put('metaDescription',$page->title);
    	\Session::put('keywords',$page->title);
    	return view('frontend.pageSingle',compact('page','pagePhoto','pages'));
    }
}
