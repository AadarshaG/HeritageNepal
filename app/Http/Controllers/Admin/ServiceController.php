<?php

namespace App\Http\Controllers\Admin;

use App\Model\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;
use Str;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('id','desc')->get();
        return view('admin.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            $destinationPath    = 'uploads/service/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        if($request->hasFile('pdf')){
            $file1 = $request->file('pdf');
            $destinationPath = 'uploads/service_pdf/';
            $files1 = $file1->getClientOriginalName();
            $fileName1 = $files1;
            $file1->move($destinationPath, $fileName1);
        }
        else
        {
            $files1= '';
        }
        $service = new Service();
        $service->title = $request->title;
        $service->slug = str_slug($request->title);
        $service->description = $request->description;
        $service->meta_title = $request->meta_title;
        $service->meta_keyword = $request->meta_keyword;
        $service->meta_description = $request->meta_description;
        $service->image = $name;
        $service->pdf = $files1;
        $status = $service->save();
        if($status){
            return redirect('services/view')->with('success','Service Added Successfully.');
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
        $service = Service::find($id);
        return view('admin.service.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit',compact('service'));
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
        $service = Service::find($id);

        $img = $service->image;
        $pdf = $service->pdf;
        if($request->hasFile('image')) {
            File::delete('uploads/service'.'/'.$img);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/service/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $img;
        }
        if($request->hasFile('pdf')){
            File::delete('uploads/service_pdf'.'/'.$pdf);
            $file1 = $request->file('pdf');
            $destinationPath = 'uploads/service_pdf/';
            $files1 = $file1->getClientOriginalName();
            $fileName1 = $files1;
            $file1->move($destinationPath, $fileName1);
        }
        else
        {
            $files1= $pdf;
        }
        $service->title = $request->title;
        $service->slug = str_slug($request->title);
        $service->description = $request->description;
        $service->meta_title = $request->meta_title;
        $service->meta_keyword = $request->meta_keyword;
        $service->meta_description = $request->meta_description;
        $service->image = $name;
        $service->pdf = $files1;
        $status = $service->save();
        if($status){
            return redirect('services/view')->with('success','Service Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating service.');
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
        $service = Service::find($id);
        $img = $service->image;
        $status = $service->delete();
        if($status){
            \File::delete('uploads/service/'.$img);
            return redirect('services/view')->with('success','Service Deleted Successfully.');
        }
        return redirect()->back()->with('error','Something is missing while deleting service.');
    }

    public function enableService($id)
    {
        $service = Service::find($id);
        $service->enabled = 1;
        $service->save();
        return redirect()->back()->with('success', 'Service  Enabled Successfully');
    }

    public function disableService($id)
    {
        $service = Service::find($id);
        $service->enabled = 0;
        $service->save();
        return redirect()->back()->with('success', 'Service  Disabled Successfully');
    }


    public function download($id){
        $id= str_replace(".pdf","",$id);
        $advert = Service::find($id);
        //dd($advert);
        $full_image_path = public_path().'/uploads/service/'. $advert->pdf;
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
