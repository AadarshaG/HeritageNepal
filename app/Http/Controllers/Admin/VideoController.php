<?php

namespace App\Http\Controllers\Admin;

use App\Model\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::select('*')->latest()->paginate(10);
        return view('admin.video.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $file1 = $request->file('image');
            $destinationPath = 'uploads/video/';
            //$extension = $file1->getClientOriginalExtension();
            $files1 = $file1->getClientOriginalName();
            $fileName1 = $files1;
            $file1->move($destinationPath, $fileName1);
        }
        else
        {
            $files1= '';
        }
        $video = new Video();
        $video->title = $request->title;
        $video->image = $files1;
        $status = $video->save();
        if($status){
            return redirect('video-gallery/view')->with('success','Video Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding video.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $img = $video->image;
        $status = $video->delete();
        if($status){
            \File::delete('uploads/video/'.$img);
            return redirect('video-gallery/view')->with('success','Video  Deleted Successfully.');
        }
        return redirect()->back()->with('error','Something is missing while deleting video.');
    }

    public function enableVideo($id)
    {
        $video = Video::find($id);
        $video->enabled = 1;
        $video->save();
        return redirect()->back()->with('success', 'Video Enabled Successfully');
    }

    public function disableVideo($id)
    {
        $video = Video::find($id);
        $video->enabled = 0;
        $video->save();
        return redirect()->back()->with('success', 'Video Disabled Successfully');
    }
}
