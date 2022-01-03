<?php

namespace App\Http\Controllers\Admin;

use App\Model\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;
use Str;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id','desc')->get();
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            $destinationPath    = 'uploads/blog/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug =  str_slug($request->title);
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->meta_description = $request->meta_description;
        $blog->image = $name;
        $status = $blog->save();
        if($status){
            return redirect('blog/view')->with('success','Service Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding service.');
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
        $blog = Blog::find($id);
        return view('admin.blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit',compact('blog'));
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
        $blog = Blog::find($id);

        $img = $blog->image;
        if($request->hasFile('image')) {
            File::delete('uploads/blog'.'/'.$img);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/blog/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $img;
        }
        $blog->title = $request->title;
        $blog->slug =  str_slug($request->title);
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->meta_description = $request->meta_description;
        $blog->image = $name;
        $status = $blog->save();
        if($status){
            return redirect('blog/view')->with('success','Blog Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating blog.');
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
        $blog = Blog::find($id);
        $img = $blog->image;
        $status = $blog->delete();
        if($status){
            \File::delete('uploads/blog/'.$img);
            return redirect('blog/view')->with('success','Blog Deleted Successfully.');
        }
        return redirect()->back()->with('error','Something is missing while deleting blog.');
    }
}
