<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Models\PrimaryInfo;

class OthersInfoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display Video Section Information.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show Section Contact photo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Change Video section information, contact section photo and body parallax Background
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display Body Parallax Photo background.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show Organization primary information.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data=PrimaryInfo::first();
        return view('backend.othersInfo.primaryInfo',compact('data'));
    }

    /**
     * Display About Company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $data=PrimaryInfo::first();
        return view('backend.othersInfo.about',compact('data'));
    }
    /**
     * Update Primary info and about company.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $input = $request->all();
       if(isset($input['map_embed'])){
            /*Embed youtube video link */
            $video=explode('src="', $input['map_embed']);
            if(isset($video[1])){
                $video=explode('"',$video[1] );
            }
            $input['map_embed'] = $video[0];
        }
        
        $data=PrimaryInfo::findOrFail($request->id);
        
        $validator = Validator::make($input, [
                    'map_embed'          => 'url',
                ]);
        
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
        if ($request->hasFile('logo')) {
                $photo=$request->file('logo');
                $img=\Image::make($photo)->resize(186,60);
                $img->save('images/logo/logo.png');
                $input['logo']='logo.png';
            }
            
        try{
            $data->update($input);
                
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect()->back()->with('success','Successfully Update');
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
        //
    }
}
