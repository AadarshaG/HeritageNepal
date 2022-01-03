<?php

namespace App\Http\Controllers\Admin;

use App\Model\Logo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;
class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::all();
        return view('admin.logo.index',compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.logo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'=> 'mimes:jpg,jpeg,png,gif'
        ]);
        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/logo/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $logo = new Logo();
        $logo->title = $request->title;
        $logo->image = $name;
        $status = $logo->save();
        if($status){
            return redirect('logo/view')->with('success','Logo Image Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding logo.');
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
        $logo = Logo::find($id);
        return view('admin.logo.edit',compact('logo'));
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
        $this->validate($request, [
            'image'=> 'mimes:jpg,jpeg,png,gif'
        ]);
        $logo = Logo::find($id);
        $img = $logo->image;

        if($request->hasFile('image')) {
            File::delete('uploads/logo'.'/'.$img);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/logo/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $img;
        }
        $logo->title = $request->title;
        $logo->image = $name;
        $status = $logo->save();
        if($status){
            return redirect('logo/view')->with('success','Logo Image Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding logo.');
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
