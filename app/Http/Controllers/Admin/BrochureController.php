<?php

namespace App\Http\Controllers\Admin;

use App\Model\Brochure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;
class BrochureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brochure = Brochure::all();
        return view('admin.brochure.index',compact('brochure'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brochure.create');
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
            $destinationPath    = 'uploads/brochure/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        if($request->hasFile('pdf')){
            $file1 = $request->file('pdf');
            $destinationPath = 'uploads/brochure/';
            $files1 = $file1->getClientOriginalName();
            $fileName1 = $files1;
            $file1->move($destinationPath, $fileName1);
        }
        else
        {
            $files1= '';
        }
        $brochure = new Brochure();
        $brochure->title = $request->title;
        $brochure->image = $name;
        $brochure->pdf = $files1;
        $status = $brochure->save();
        if($status){
            return redirect('brochure/view')->with('success','Brochure Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding brochure.');
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
        $id= str_replace(".pdf","",$id);
        $advert = Brochure::find($id);
        //dd($advert);
        $full_image_path = public_path().'/uploads/brochure/'. $advert->pdf;
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brochure = Brochure::find($id);
        return view('admin.brochure.edit',compact('brochure'));
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
            'image'=> 'mimes:jpg,jpeg,png,gif',
            'pdf'=> 'mimes:pdf'
        ]);
        $brochure = Brochure::find($id);

        $img = $brochure->image;
        $pdf = $brochure->pdf;
        if($request->hasFile('image')) {
            File::delete('uploads/brochure'.'/'.$img);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/brochure/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $img;
        }
        if($request->hasFile('pdf')){
            File::delete('uploads/brochure'.'/'.$pdf);
            $file1 = $request->file('pdf');
            $destinationPath = 'uploads/brochure/';
            $files1 = $file1->getClientOriginalName();
            $fileName1 = $files1;
            $file1->move($destinationPath, $fileName1);
        }
        else
        {
            $files1= $pdf;
        }
        $brochure->title = $request->title;
        $brochure->image = $name;
        $brochure->pdf = $files1;
        $status = $brochure->save();
        if($status){
            return redirect('brochure/view')->with('success','Brochure Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating brochure.');
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
