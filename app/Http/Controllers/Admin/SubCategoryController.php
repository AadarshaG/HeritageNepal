<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::orderBy('id','desc')->get();
        return view('admin.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = Category::all();
        return view('admin.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubCategory::create([
            'category_id'=>$request->category_id,
            'subcategory_name'=> $request->subcategory_name,
            'slug'=> str_slug($request->subcategory_name),
            'created_by'=>$request->created_by,
        ]);

        return redirect('subcategory/view')->with('success', 'Sub-Category added Successfully');
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
        $categories = Category::all();
        $subcategory = SubCategory::find($id);
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
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
        $subcategory = SubCategory::find($id);

        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->slug = str_slug($request->subcategory_name);
        $status = $subcategory->save();
        if($status){
            return redirect('subcategory/view')->with('success', 'SubCategory Updated Successfully');
        }
            return redirect()->back()->with('error', 'SubCategory Couldnot Updated At this moment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory-> delete();
        return redirect()->back()->with('error', 'SubCategory Deleted Successfully');
    }

    //get category
    public function subcategory($id)
    {
        $subcategory = SubCategory::select('*')->where('category_id',$id)->get();
        return response()->json(['status'=>'success','result'=>$subcategory]);
    }
}
