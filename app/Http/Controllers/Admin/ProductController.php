<?php

namespace App\Http\Controllers\Admin;

use App\Model\Product;
use App\Model\Category;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;
use Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
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
            $destinationPath    = 'uploads/product/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        if($request->hasFile('pdf')){
            $file1 = $request->file('pdf');
            $destinationPath = 'uploads/product_pdf/';
            $files1 = $file1->getClientOriginalName();
            $fileName1 = $files1;
            $file1->move($destinationPath, $fileName1);
        }
        else
        {
            $files1= '';
        }
        $product = new Product();
        $product->category_id = $request->input('category_id');
        $product->subcategory_id = $request->input('subcategory_id');
        $product->product_name = $request->input('product_name');
        $product->slug = str_slug($request->input('product_name'));
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->in_stock = $request->input('in_stock');
        $product->image = $name;
        $product->pdf = $files1;

        if($product->save()){
            return redirect('admin-product/view')->with('success','Product Added Successfully.');
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
        $product = Product::find($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
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
        $product = Product::find($id);

        $img = $product->image;
        $pdf = $product->pdf;
        if($request->hasFile('image')) {
            File::delete('uploads/product'.'/'.$img);
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/product/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $img;
        }
        if($request->hasFile('pdf')){
            File::delete('uploads/product_pdf'.'/'.$pdf);
            $file1 = $request->file('pdf');
            $destinationPath = 'uploads/product_pdf/';
            $files1 = $file1->getClientOriginalName();
            $fileName1 = $files1;
            $file1->move($destinationPath, $fileName1);
        }
        else
        {
            $files1= $pdf;
        }
        $product->product_name = $request->input('product_name');
        $product->slug = str_slug($request->input('product_name'));
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->in_stock = $request->input('in_stock');
        $product->image = $name;
        $product->pdf = $files1;

        if($product->save()){
            return redirect('admin-product/view')->with('success','Product Added Successfully.');
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
        $product = Product::find($id);
        $image = $product->image;
        if($product->delete()){
            File::delete('uploads/product'.'/'.$image);
            return redirect()->back()->with('error', 'Product Deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Product Could not be Deleted at this moment.');
        }
    }

    public function enableProduct($id)
    {
        $product = Product::find($id);
        $product->enabled = 1;
        $product->save();
        return redirect()->back()->with('success', 'Product Enabled Successfully');
    }

    public function disableProduct($id)
    {
        $product = Product::find($id);
        $product->enabled = 0;
        $product->save();
        return redirect()->back()->with('success', 'Product Disabled Successfully');
    }

    public function quickedit(Request $request, $id)
    {
        $product = Product::find($id);
        $product->price = $request->price;
        $product->in_stock = $request->in_stock;
        $product->save();
        return redirect()->back()->with('success', 'Product successfully updated');
    }


    public function download($id){
        $id= str_replace(".pdf","",$id);
        $advert = Product::find($id);
        //dd($advert);
        $full_image_path = public_path().'/uploads/product/'. $advert->pdf;
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
