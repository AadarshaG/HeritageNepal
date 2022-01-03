<?php

namespace App\Http\Controllers\Admin;

use App\Model\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial = Testimonial::orderBy('id','desc')->get();
        return view('admin.testimonial.index',compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
            $destinationPath    = 'uploads/testimonial/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $testimonial = new Testimonial();
        $testimonial->title = $request->title;
        $testimonial->position = $request->position;
        $testimonial->description = $request->description;
        $testimonial->image = $name;
        $status = $testimonial->save();
        if($status){
            return redirect('testimonial/view')->with('success','Testimonial Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding testimonial.');
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
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.show',compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit',compact('testimonial'));
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
        $testimonial = Testimonial::find($id);

        $img = $testimonial->image;
        if($request->hasFile('image')) {
            File::delete('uploads/testimonial'.'/'.$img);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/testimonial/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $img;
        }
        $testimonial->title = $request->title;
        $testimonial->position = $request->position;
        $testimonial->description = $request->description;
        $testimonial->image = $name;
        $status = $testimonial->save();
        if($status){
            return redirect('testimonial/view')->with('success','Testimonial Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating testimonial.');
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
        $testimonial = Testimonial::find($id);
        $img = $testimonial->image;
        $status = $testimonial->delete();
        if($status){
            \File::delete('uploads/testimonial/'.$img);
            return redirect('testimonial/view')->with('success','Service Deleted Successfully.');
        }
        return redirect()->back()->with('error','Something is missing while deleting testimonial.');
    }


    public function enableTestimonial($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->enabled = 1;
        $testimonial->save();
        return redirect()->back()->with('success', 'Testimonial  Enabled Successfully');
    }

    public function disableTestimonial($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->enabled = 0;
        $testimonial->save();
        return redirect()->back()->with('success', 'Testimonial  Disabled Successfully');
    }
}
