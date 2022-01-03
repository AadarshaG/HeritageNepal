<?php

namespace App\Http\Controllers\Admin;

Use App\User;
use App\Model\DealerProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DealersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dealers = User::where('role_id','=', 2)->where('is_approved', '=', 1)->get();
        return view('admin.users.dealers.index', compact('dealers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dealer = User::find($id);
        $dealer_profile = DealerProfile::where('user_id', '=', $id)->first();
        return view('admin.users.dealers.view', compact('dealer', 'dealer_profile'));

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
        $dealer = User::find($id);
        $dealer->delete();
        return redirect('dealers/view')->with('success', 'User Deleted Successfully.');
    }

    public function allrequest()
    {
        $dealer_reqs = User::where('role_id', '=', 2)->where('is_approved', '=', 0)->paginate(15);
        return view('admin.users.dealers.requests', compact('dealer_reqs'));

    }

    public function approveDealer($id)
    {
        $dealer = User::find($id);
        $dealer->is_approved = 1;
        $dealer->save();
        return redirect('dealers/all-request')->with('success', 'User Approved Successfully');
    }

    public function disapproveDealer($id)
    {
        $dealer = User::find($id);
        $dealer->is_approved = 0;
        $dealer->save();
        return redirect()->back()->with('success', 'User Disapproved Successfully');
    }
}
