<?php

namespace App\Http\Controllers\Admin;

use App\Model\Social;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;
class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social = Social::all();
        return view('admin.social.index',compact('social'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social.create');
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
            'icon'=> 'mimes:jpg,jpeg,png,gif'
        ]);
        if($request->hasFile('icon')) {
            $icon              = $request->file('icon');
            $ImageUpload        = Image::make($icon)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $icon->getClientOriginalExtension();
            $destinationPath    = 'uploads/social/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $social = new Social();
        $social->title = $request->title;
        $social->icon = $name;
        $social->link = $request->link;
        $status = $social->save();
        if($status){
            return redirect('social-link/view')->with('success','Social Link Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding social link.');
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
        $social = Social::find($id);
        return view('admin.social.edit',compact('social'));
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
            'icon'=> 'mimes:jpg,jpeg,png,gif'
        ]);
        $social = Social::find($id);

        $img = $social->icon;

        if($request->hasFile('icon')) {
            File::delete('uploads/social'.'/'.$img);
            $icon              = $request->file('icon');
            $ImageUpload        = Image::make($icon)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $icon->getClientOriginalExtension();
            $destinationPath    = 'uploads/social/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $img;
        }
        $social->title = $request->title;
        $social->icon = $name;
        $social->link = $request->link;
        $status = $social->save();
        if($status){
            return redirect('social-link/view')->with('success','Social Link Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating social link.');
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
        $social = Social::find($id);
        $img = $social->icon;
        $status = $social->delete();
        if($status){
            \File::delete('uploads/social/'.$img);
            return redirect('social-link/view')->with('success','Social Link Deleted Successfully.');
        }
        return redirect()->back()->with('error','Something is missing while deleting social link.');
    }
}
