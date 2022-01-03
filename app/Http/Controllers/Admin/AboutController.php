<?php

namespace App\Http\Controllers\Admin;

use App\Model\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all();
        return view('admin.about.index',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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
            $destinationPath    = 'uploads/about/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        if($request->hasFile('pdf')){
            $file1 = $request->file('pdf');
            $destinationPath = 'uploads/about/';
            $files1 = $file1->getClientOriginalName();
            $fileName1 = $files1;
            $file1->move($destinationPath, $fileName1);
        }
        else
        {
            $files1= '';
        }
        $about = new About();
        $about->title = $request->title;
        $about->description = $request->description;
        $about->meta_title = $request->meta_title;
        $about->meta_keyword = $request->meta_keyword;
        $about->meta_description = $request->meta_description;
        $about->image = $name;
        $about->pdf = $files1;
        $status = $about->save();
        if($status){
            return redirect('about-us/view')->with('success','About Us Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding product.');
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
        $about = About::find($id);
        return view('admin.about.show',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::find($id);
        return view('admin.about.edit',compact('about'));
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
        $about = About::find($id);

        $img = $about->image;
        $pdf = $about->pdf;
        if($request->hasFile('image')) {
            File::delete('uploads/about'.'/'.$img);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/about/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $img;
        }
        if($request->hasFile('pdf')){
            File::delete('uploads/about'.'/'.$pdf);
            $file1 = $request->file('pdf');
            $destinationPath = 'uploads/about/';
            $files1 = $file1->getClientOriginalName();
            $fileName1 = $files1;
            $file1->move($destinationPath, $fileName1);
        }
        else
        {
            $files1= $pdf;
        }
        $about->title = $request->title;
        $about->description = $request->description;
        $about->meta_title = $request->meta_title;
        $about->meta_keyword = $request->meta_keyword;
        $about->meta_description = $request->meta_description;
        $about->image = $name;
        $about->pdf = $files1;
        $status = $about->save();
        if($status){
            return redirect('about-us/view')->with('success','About Us Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding product.');
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

    public function download($id){
        $id= str_replace(".pdf","",$id);
        $advert = About::find($id);
        //dd($advert);
        $full_image_path = public_path().'/uploads/about/'. $advert->pdf;
        //dd($full_image_path);
        // filename and look at the extension of the file being requested
        $extension = pathinfo($advert->pdf, PATHINFO_EXTENSION);
        //dd($extension);
        //create an array of items to reject being downloaded
        $blocked = ['php', 'htaccess'];
        //if the requested file is not in the blocked array
        if (! in_array($extension, $blocked)) {
            //download the file
            $callback = function($full_image_path)
            {
                $handle = fopen($full_image_path, "r");
                $filecontent= fread($handle, filesize($full_image_path));
                fclose($handle);

                return $filecontent;
            };
            // return response()->stream($callback($full_image_path), 200, []);
            $data = file_get_contents($full_image_path);
            header('Content-Type: application/pdf');
            echo $data;
            exit;
        }
    }
}
