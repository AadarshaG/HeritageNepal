<?php

namespace App\Http\Controllers\Admin;

use App\Model\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        return view('admin.banner.index',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            $destinationPath    = 'uploads/banner/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $banner = new Banner();
        $banner->title = $request->title;
        $banner->image = $name;
        $status = $banner->save();
        if($status){
            return redirect('banner-image/view')->with('success','Banner Image Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding banner image.');
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
        $banner = Banner::find($id);
        return view('admin.banner.edit',comapct('banner'));
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
        $banner = Banner::find($id);

        $img = $banner->image;
        if($request->hasFile('image')) {
            File::delete('uploads/banner'.'/'.$img);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/banner/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $img;
        }
        $banner->title = $request->title;
        $banner->image = $name;
        $status = $banner->save();
        if($status){
            return redirect('banner-image/view')->with('success','Banner Image Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating banner image.');
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
        $banner = Banner::find($id);
        $img = $banner->image;
        $status = $banner->delete();
        if($status){
            \File::delete('uploads/banner/'.$img);
            return redirect('banner-image/view')->with('success','Banner Image Deleted Successfully.');
        }
        return redirect()->back()->with('error','Something is missing while deleting banner image.');
    }

    public function enableBanner($id)
    {
        $banner = Banner::find($id);
        $banner->enabled = 1;
        $banner->save();
        return redirect()->back()->with('success', 'Banner Image Enabled Successfully');
    }

    public function disableBanner($id)
    {
        $banner = Banner::find($id);
        $banner->enabled = 0;
        $banner->save();
        return redirect()->back()->with('success', 'Banner Image Disabled Successfully');
    }
}
