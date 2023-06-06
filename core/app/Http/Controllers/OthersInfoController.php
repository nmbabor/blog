<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Models\PrimaryInfo;

class OthersInfoController extends Controller
{
    public function __construct()
    {
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display Body Parallax Photo background.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show Organization primary information.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PrimaryInfo::first();
        return view('backend.othersInfo.primaryInfo', compact('data'));
    }

    /**
     * Display About Company.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $data = PrimaryInfo::first();
        return view('backend.othersInfo.about', compact('data'));
    }

    /**
     * Update Primary info and about company.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'map_embed' => 'url',
        ]);
        try {
            $input = $request->all();
            if (isset($input['map_embed'])) {
                /*Embed youtube video link */
                $embed = explode('src="', $input['map_embed']);
                if (isset($embed[1])) {
                    $embed = explode('"', $embed[1]);
                }
                $input['map_embed'] = $embed[0];
            }

            $data = PrimaryInfo::findOrFail($request->id);
            if ($request->hasFile('logo')) {
                $photo = $request->file('logo');
                $img = \Image::make($photo)->resize(186, 60);
                $fileName = "logo-".time().".png";
                $img->save('assets/images/logo/'.$fileName);
                $input['logo'] = 'assets/images/logo/'.$fileName;
            }
            $data->update($input);

            return redirect()->back()->with('success', 'Successfully Update');
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            return redirect()->back()->with('error', $errorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
