<?php

namespace App\Http\Controllers\Admin;

use App\Model\Info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Info::orderBy('id','desc')->get();
        return view('admin.info.index',compact('infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.info.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info = new Info();
        $info->address = $request->address;
        $info->phone = $request->phone;
        $info->mail = $request->mail;
        $info->iframe = $request->iframe;
        $status = $info->save();
        if($status){
            return redirect('contact-info/view')->with('success','Contact Info Added Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while adding contact info.');
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
        $info = Info::find($id);
        return view('admin.info.edit',compact('info'));
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
        $info = Info::find($id);

        $info->address = $request->address;
        $info->phone = $request->phone;
        $info->mail = $request->mail;
        $info->iframe = $request->iframe;
        $status = $info->save();
        if($status){
            return redirect('contact-info/view')->with('success','Contact Info Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while updating contact info.');
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
