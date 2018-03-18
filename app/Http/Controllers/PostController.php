<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Category;
use App\Model\SubCategory;
use Validator;
use Auth;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData=Post::leftJoin('categories','posts.fk_category_id','categories.id')->leftJoin('sub_categories','posts.fk_sub_category_id','sub_categories.id')->leftJoin('users','posts.created_by','users.id')->select('posts.*','category_name','sub_category_name','name as user_name')->orderBy('posts.id','DESC')->paginate(10);
        return view('backend.post.index',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = SubCategory::allTags();
        $categories=Category::where('status',1)->orderBy('category_name','ASC')->pluck('category_name','id');
        return view('backend.post.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $input['link']=CommonController::slugify($input['link']);
        $input['created_by']=Auth::user()->id;
        $validator = Validator::make($input, [
                    'title' => 'required|max:255',
                    'description' => 'required',
                    'fk_category_id' => 'required',
                    'fk_sub_category_id' => 'required',
                    'link' => 'required|unique:posts,link|max:50',
                ]);
            
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

        try{
            if ($request->hasFile('feature_photo')) {
                $photo=$request->file('feature_photo');
                $fileType=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                $path2=base_path().'/images/post/small/'.date('Y/m/d');
                if (!is_dir($path2)) {
                    mkdir("$path2",0777,true);
                    }
                $path3=base_path().'/images/post/big/'.date('Y/m/d');
                if (!is_dir($path3)) {
                    mkdir("$path3",0777,true);
                    }
                /*$fileName=$feature_photo->getClientOriginalName();*/
                $img = Image::make($photo);
                $img->resize(350, 177);
                $img->save('images/post/big/'.date('Y/m/d/').$fileName);
                $img->resize(100, 51);
                $img->save('images/post/small/'.date('Y/m/d/').$fileName);
                $input['feature_photo']=date('Y/m/d/').$fileName;
            }

        $cat_id=Post::create($input)->id;

        $bug=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $bug1=$e->errorInfo[2];
        }
         if($bug==0){
        return redirect('posts-admin')->with('success','Post Successfully Inserted');
        }elseif($bug==1062){
            return redirect()->back()->with('error','The link has already been taken.');
        }else{
            return redirect()->back()->with('error','Error: '.$bug1);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Post::findOrFail($id);
        $tags = SubCategory::allTags();
        $categories=Category::where('status',1)->orderBy('category_name','ASC')->pluck('category_name','id');
        $subCategory=SubCategory::where('status',1)->orderBy('sub_category_name','ASC')->pluck('sub_category_name','id');
        return view('backend.post.edit',compact('data','categories','tags','subCategory'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=Post::findOrFail($id);
        $input = $request->except('_token');
        $input['link']=CommonController::slugify($input['link']);
        $input['created_by']=Auth::user()->id;
        $validator = Validator::make($input, [
                    'title' => 'required|max:255',
                    'description' => 'required',
                    'fk_category_id' => 'required',
                    'fk_sub_category_id' => 'required',
                    'link' => "required|unique:posts,link,$id|max:50",
                ]);
            
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

        try{
            if ($request->hasFile('feature_photo')) {
                $photo=$request->file('feature_photo');
                $fileType=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                $path=base_path().'/images/post/big/'.date('Y/m/d');
                if (!is_dir($path)) {
                    mkdir("$path",0777,true);
                    }
                $path2=base_path().'/images/post/small/'.date('Y/m/d');
                if (!is_dir($path2)) {
                    mkdir("$path2",0777,true);
                    }
                /*$fileName=$feature_photo->getClientOriginalName();*/
                $img = Image::make($photo);
                $img->resize(350, 177);
                $img->save('images/post/big/'.date('Y/m/d/').$fileName);
                $img->resize(100, 51);
                $img->save('images/post/small/'.date('Y/m/d/').$fileName);
                $input['feature_photo']=date('Y/m/d/').$fileName;

                /*Delete old photo*/
                $img_path1=base_path().'/images/post/big/'.$data->feature_photo;
                $img_path2=base_path().'/images/post/small/'.$data->feature_photo;

                if($data->feature_photo!=null){
                    if(file_exists($img_path1)){
                        unlink($img_path1);
                    }
                    if(file_exists($img_path2)){
                        unlink($img_path2);
                    }
                }
            }

       $data->update($input);

        $bug=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $bug1=$e->errorInfo[2];
        }
         if($bug==0){
        return redirect()->back()->with('success','Post Successfully Updated');
        }elseif($bug==1062){
            return redirect()->back()->with('error','The link has already been taken.');
        }else{
            return redirect()->back()->with('error','Error: '.$bug1);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
         $data=Post::where('id',$id)->first();
         /*Delete old photo*/
            $img_path1=base_path().'/images/post/big/'.$data->feature_photo;
            $img_path2=base_path().'/images/post/small/'.$data->feature_photo;

            if($data->feature_photo!=null){
                if(file_exists($img_path1)){
                    unlink($img_path1);
                }
                if(file_exists($img_path2)){
                    unlink($img_path2);
                }
            }
            $data->delete();
            $bug=0;
            $error=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $error=$e->errorInfo[2];
        }
        if($bug==0){
       return redirect()->back()->with('success','Ad Successfully Deleted!');
        }elseif($bug==1451){
            return redirect()->back()->with('error','This ad is Used anywhere ! ');
        }
        elseif($bug>0){
       return redirect()->back()->with('error','Some thing error found !');

        } 
    }

    public function loadSubCat($id)
    {
        $subCategory=SubCategory::where(['status'=>1,'fk_category_id'=>$id])->orderBy('sub_category_name','ASC')->pluck('sub_category_name','id');
        return view('backend.post.loadSubCategory',compact('subCategory'));
    }

    public function searchTag(Request $request)
    {
        $name=$request->name;
        $cat=$request->cat;
        $result=SubCategory::where('id',$cat)->value('sub_keywords');
        $data=explode(',',$result);
        return json_encode($data);
    }
    public function searchTags(Request $request,$id)
    {
        $result=SubCategory::where('id',$id)->value('sub_keywords');
        $data=explode(',',$result);
        return json_encode($result);
    }



}
