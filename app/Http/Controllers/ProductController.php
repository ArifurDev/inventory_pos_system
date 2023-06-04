<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('dashbord.Product.show',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $supplier = Supplier::all();
        return view('dashbord.Product.create',compact('category','supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([

        'category_id' => 'required',
        'product_name' => 'required',
        'product_image' => 'required|mimes:jpg,png,jpeg,gif',
        'buy_date' => 'required',
        'buying_price' => 'required',
        'seling_price' => 'required',
       ]);

         //image upload image

         $file_name = auth()->id() . '-' . time() . '.' . $request->file('product_image')->getClientOriginalExtension();
         $img = Image::make($request->file('product_image'));
         $img->save(base_path('public/upload/product_image/' . $file_name), 80);

        //get category name
         $category_name = Category::find($request->category_id)->value('category_name');
        //get category name
         $supplier_name = Supplier::find($request->supplier_id)->value('name');

         $data = new Product;
         $data->category_name = $category_name;
         $data->category_id = $request->category_id;
         $data->supplier_name = $supplier_name;
         $data->supplier_id = $request->supplier_id;
         $data->product_name = $request->product_name;
         $data->product_code = $request->product_code;
         $data->product_storehouse = $request->product_storehouse;
         $data->product_route = $request->product_route;
         $data->product_image = $file_name;
         $data->buy_date = $request->buy_date;
         $data->expaire_date = $request->expaire_date;
         $data->buying_price = $request->buying_price;
         $data->seling_price = $request->seling_price;
         $data->save();
         $notification = array(
             'message' => 'Add Product Successfull',
             'alert-type' => 'success'
         );
         return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.show single product all information
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('dashbord.Product.view',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      $category = Category::all();
      $supplier = Supplier::all();

      $product = Product::find($id);

      return view('dashbord.Product.edit',compact('category','supplier','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'category_id' => 'required',
            'product_name' => 'required',
            'buy_date' => 'required',
            'buying_price' => 'required',
            'seling_price' => 'required',
           ]);

          //get category name
          $category_name = Category::find($request->category_id)->value('category_name');
         //get category name
          $supplier_name = Supplier::find($request->supplier_id)->value('name');
         //get product image
         $photo = Product::find($id)->value('product_image');

           Product::find($id)->update([
                'category_name' => $category_name,
                'category_id' => $request->category_id,
               'supplier_name' => $supplier_name,
               'supplier_id' => $request->supplier_id,
                'product_name' => $request->product_name,
                'product_code' => $request->product_code,
                'product_storehouse' => $request->product_storehouse,
                'product_route' => $request->product_route,
                'buy_date' => $request->buy_date,
                'expaire_date' => $request->expaire_date,
                'buying_price' => $request->buying_price,
                'seling_price' => $request->seling_price,
           ]);


        if($request->hasFile('product_image')){
            //product image validation if set image
            $request->validate([
                'product_image' => 'mimes:jpg,png,jpeg,gif',
               ]);
            //customer image update
           unlink(base_path('public/upload/product_image/'.$photo));

            $file_name = auth()->id() . '-' . time() . '.' . $request->file('product_image')->getClientOriginalExtension();
            $img = Image::make($request->file('product_image'));
            $img->save(base_path('public/upload/product_image/' . $file_name), 80);

            Product::find($id)->update([
                 'product_image' => $file_name,
               ]);
           }
           $notification = array(
            'message' => 'Product updated Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Product_info = Product::find($id);
        unlink(base_path('public/upload/product_image/' . $Product_info->product_image));
        $Product_info->forceDelete();
         $notification = array(
        'message' => 'Product item Delete forever',
        'alert-type' => 'warning'
        );
       return redirect()->back()->with($notification);
    }
}
