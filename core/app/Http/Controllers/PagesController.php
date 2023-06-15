<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Str;
use Validator;
use App\Models\Page;
use App\Models\PagePhoto;


class PagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData=Page::orderBy('id','desc')
            ->paginate(15);
        return view('backend.page.index',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'title'  => 'required',
            'link'  => "required|max:50|unique:page",
            'photo' => 'array',
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
            $input = $request->all();



        try{
            $input['link']= Str::slug($request->link);

            /*--Upload photo into page--*/
            $pagePhotos= [];
            if ($request->hasFile('photo')) {
                foreach ($request->file('photo') as $photo) {
                    $fileName = rand(1, 1000) . date('dmyhis') . "." . $photo->extension();
                    $pagePhotos[] = $fileName;
                    $img = \Image::make($photo)->resize(850, 350);
                    $img->save('assets/images/page/' . $fileName);
                }
            }else{
                unset($input['photo']);
            }
            $currentId=Page::create($input)->id;
            $input2=array();
            if (isset($pagePhotos)) {
                $input2['fk_page_id']=$currentId;
                foreach($pagePhotos as $pagePhoto){
                    $input2['photo']=$pagePhoto;
                    PagePhoto::create($input2);
                }
            }

            return redirect("pages/$currentId/edit")->with('success','Data Successfully Inserted');
            }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
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
        $data=Page::findOrFail($id);
        $data['photo']=PagePhoto::where('fk_page_id',$id)->get();
        return view('backend.page.packageDetails',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Page::findOrFail($id);
        $data['photo']=PagePhoto::where('fk_page_id',$id)->get();
        return view('backend.page.edit',compact('data'));
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
        $input = $request->all();
        $data=Page::findOrFail($request->id);
        $input['link']= Str::slug($request->link);
        $request->validate([
            'name'      => 'required',
            'title'  => 'required',
            'link'  => "required|max:50|unique:page,link,$id",
            'photo' => 'array',
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
            /*-- Photo Upload --*/

        try{
            $pagePhotos=[];
            if ($request->hasFile('photo')) {
                foreach ($request->file('photo') as $photo){
                    $fileName = rand(1,1000).date('dmyhis').".".$photo->extension();
                    $pagePhotos[]=$fileName;
                    $img=\Image::make($photo)->resize(850,350);
                    $img->save('assets/images/page/'.$fileName );
                }
            }
            /*--Delete Photo--*/
            if(isset($request->del_photo)){
                foreach($request->del_photo as $delPhoto){
                    $deletePhoto=PagePhoto::findOrFail($delPhoto);
                    $img_path='public/img/page/'.$deletePhoto->photo;
                    if(file_exists($img_path)){
                        unlink($img_path);
                    }
                    $deletePhoto->delete();
                }
            }
            $data->update($input);


            if (isset($pagePhotos)) {
                $input2['fk_page_id']=$id;
                foreach($pagePhotos as $pagePhoto){
                    $input2['photo']=$pagePhoto;
                    PagePhoto::create($input2);
                }
            }
            return redirect()->back()->with('success','Data Successfully Updated');
            }catch(\Exception $e){
                return redirect()->back()->with('error',$e->getMessage());
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
        $data=Page::findOrFail($id);
        $pagePhoto=PagePhoto::where('fk_page_id',$id)->get();
        foreach ($pagePhoto as $row) {
            $img_path='public/img/page/'.$row['photo'];
            if($row['photo']!=null and file_exists($img_path)){
               unlink($img_path);
            }
        }
        $file_path='public/files/page/'.$data['file'];
        if($data['file']!=null and file_exists($file_path)){
           unlink($file_path);
        }

       try{
        PagePhoto::where('fk_page_id',$id)->delete();

            $data->delete();
            $bug=0;
            $error=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $error=$e->errorInfo[2];
        }
        if($bug==0){
       return redirect('pages')->with('success','Data has been Successfully Deleted!');
        }elseif($bug==1451){
       return redirect('pages')->with('error','This Data is Used anywhere ! ');

        }
        elseif($bug>0){
       return redirect('pages')->with('error','Some thing error found !');

        }
    }


}
