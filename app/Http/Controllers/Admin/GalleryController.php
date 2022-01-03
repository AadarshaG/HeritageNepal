<?php

namespace App\Http\Controllers\Admin;

use App\Model\Gallery;
use App\Model\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;
use Str;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::orderBy('id','desc')->get();
        return view('admin.gallery.index',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::select('*')->get();
        return view('admin.gallery.create',compact('services'));
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
            $destinationPath    = 'uploads/gallery/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $gallery = new Gallery();
        $gallery->service_id = $request->service_id;
        $gallery->title = $request->title;
        $gallery->slug = str_slug($request->title);
        $gallery->client_title = $request->client_title;
        $gallery->location = $request->location;
        $gallery->service_provided = $request->service_provided;
        $gallery->image = $name;
        $status = $gallery->save();
        if($status){
            return redirect('gallery-image/view')->with('success','Gallery Image Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding gallery image.');
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
        $gallery = Gallery::find($id);
        $services = Service::select('*')->get();
        return view('admin.gallery.edit',compact('gallery','services'));
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
        $gallery = Gallery::find($id);

        $img = $gallery->image;
        if($request->hasFile('image')) {
            File::delete('uploads/gallery'.'/'.$img);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/gallery/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $img;
        }
        //$gallery->service_id = $request->service_id;
        $gallery->title = $request->title;
        $gallery->slug = str_slug($request->title);
        $gallery->client_title = $request->client_title;
        $gallery->location = $request->location;
        $gallery->service_provided = $request->service_provided;
        $gallery->image = $name;
        $status = $gallery->save();
        if($status){
            return redirect('gallery-image/view')->with('success','Gallery Image Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating product.');
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
        $gallery = Gallery::find($id);
        $img = $gallery->image;
        $status = $gallery->delete();
        if($status){
            \File::delete('uploads/gallery/'.$img);
            return redirect('gallery-image/view')->with('success','Gallery Image Deleted Successfully.');
        }
        return redirect()->back()->with('error','Something is missing while deleting gallery image.');
    }

    public function enableGallery($id)
    {
        $gallery = Gallery::find($id);
        $gallery->enabled = 1;
        $gallery->save();
        return redirect()->back()->with('success', 'Gallery Image Enabled Successfully');
    }

    public function disableGallery($id)
    {
        $gallery = Gallery::find($id);
        $gallery->enabled = 0;
        $gallery->save();
        return redirect()->back()->with('success', 'Gallery Image Disabled Successfully');
    }
}
