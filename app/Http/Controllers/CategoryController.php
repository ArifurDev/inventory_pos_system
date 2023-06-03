<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category_trash = Category::onlyTrashed()->get();
        $category = Category::all();
        return view('dashbord.Category.index',compact('category','category_trash'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name'=>'required|unique:categories,category_name,',
            'image'=>'required|mimes:jpg,png,jpeg,gif',
        ]);

        //image upload image

        $file_name = auth()->id() . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
        $img = Image::make($request->file('image'));
        $img->save(base_path('public/upload/category_image/' . $file_name), 80);

        $data = new Category;
        $data->category_name = $request->category_name;
        $data->image = $file_name;
        $data->save();
        $notification = array(
            'message' => 'Category Create Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $category = Category::find($id);
        return view('dashbord.Category.edit',compact('category','category_info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name'=>'unique:categories,category_name,'.$id,
            'image'=>'mimes:jpg,png,jpeg,gif',
        ]);

        Category::find($id)->update([
            'category_name' => $request->category_name,
        ]);

        $category_image  = Category::find($id)->value('image');

        if($request->hasFile('image')){
         //product image update
        unlink(base_path('public/upload/category_image/'.$category_image));

         $file_name = auth()->id() . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
         $img = Image::make($request->file('image'));
         $img->save(base_path('public/upload/category_image/' . $file_name), 80);

         Category::find($id)->update([
             'image' => $file_name,
            ]);
        }
        $notification = array(
            'message' => 'Category update Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      Category::find($id)->delete();
      $notification = array(
        'message' => 'Category temp deleted',
        'alert-type' => 'warning'
        );
       return redirect()->back()->with($notification);

    }


    /**
     * restore the specified resource from storage.
     */
    public function restore($id)
    {
        Category::onlyTrashed()->find($id)->restore();
         $notification = array(
        'message' => 'Category Restore Successfull',
        'alert-type' => 'info'
        );
       return redirect()->back()->with($notification);

    }

     /**
     * Delete forever the specified resource from storage.
     */
    public function delete($id)
    {
        $category_info = Category::onlyTrashed()->find($id);
        unlink(base_path('public/upload/category_image/' . $category_info->image));
        $category_info->forceDelete();
         $notification = array(
        'message' => 'Category item Delete forever',
        'alert-type' => 'warning'
        );
       return redirect()->back()->with($notification);

    }
}
