<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\SubCategory;
use Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'sub_category_name' => 'required'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
        $input = $request->all();
        $input['created_by']=\Auth::user()->id;
        $input['sub_link']=CommonController::slugify($input['sub_link']);
        try{
        SubCategory::create($input);
        $bug=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $bug1=$e->errorInfo[2];
        }
         if($bug==0){
        return redirect()->back()->with('success','Data Successfully Inserted');
        }elseif($bug==1062){
            return redirect()->back()->with('error','The name has already been taken.');
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
        $allData=SubCategory::leftJoin('categories','sub_categories.fk_category_id','=','categories.id')
            ->select('sub_categories.*','categories.category_name','categories.id as category_id')
            ->where('sub_categories.fk_category_id',$id)->orderBy('sub_categories.id','desc')->paginate(10);
        $category=Category::findOrFail($id);
        $max_serial=SubCategory::where('fk_category_id',$id)->max('serial_num')+1;
        return view('backend.category.subCategory',compact('allData','category','max_serial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $input=$request->all();
         $validator = Validator::make($request->all(), [
                    'sub_category_name' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->with('error','Something Error found.');
                }
        $input['sub_link']=CommonController::slugify($input['sub_link']);
        $data=SubCategory::findOrFail($id);
        try{
            $data->update($input);
            $bug=0;
        }catch(\Exception $e){
            $bug = $e->errorInfo[1]; 
        }
        if($bug==0){
        return redirect()->back()->with('success','Data Successfully Updated');
        }elseif($bug==1062){
            return redirect()->back()->with('error','The name has already been taken.');
        }else{
            return redirect()->back()->with('error','Something Error Found ! ');
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
        $data=SubCategory::findOrFail($id);
        try{
            $data->delete();
            $bug=0;
            $error=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $error=$e->errorInfo[2];
        }
        if($bug==0){
       return redirect()->back()->with('success','Data has been Successfully Deleted!');
        }elseif($bug==1451){
       return redirect()->back()->with('error','This Data is Used anywhere ! ');

        }
        elseif($bug>0){
       return redirect()->back()->with('error','Some thing error found !');

        }
    }
}
