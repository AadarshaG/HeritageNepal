<?php

namespace App\Http\Controllers\Admin;

use App\Model\Choose;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;

class ChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $choose = Choose::orderBy('id','desc')->get();
        return view('admin.choose.index',compact('choose'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.choose.create');
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
            $destinationPath    = 'uploads/choose/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $choose = new Choose();
        $choose->title = $request->title;
        $choose->image = $name;
        $status = $choose->save();
        if($status){
            return redirect('why-choose-us/view')->with('success','Why Choose Us Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding why choose us.');
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
        $choose = Choose::find($id);
        return view('admin.choose.edit',compact('choose'));
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
        $choose = Choose::find($id);
        $img = $choose->image;
        if($request->hasFile('image')) {
            File::delete('uploads/choose'.'/'.$img);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/choose/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $img;
        }
        $choose->title = $request->title;
        $choose->image = $name;
        $status = $choose->save();
        if($status){
            return redirect('why-choose-us/view')->with('success','Why Choose Us Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating why choose us.');
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
        $choose = Choose::find($id);
        $img = $choose->image;
        $status = $choose->delete();
        if($status){
            \File::delete('uploads/choose/'.$img);
            return redirect('why-choose-us/view')->with('success','Why Choose Us Deleted Successfully.');
        }
        return redirect()->back()->with('error','Something is missing while deleting why choose us.');
    }
}
