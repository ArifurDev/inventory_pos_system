<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier_trash = Supplier::onlyTrashed()->get();
        $supplier =Supplier::all();
        return view('dashbord.Supplier.index',compact('supplier','supplier_trash'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.Supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:suppliers',
            'phone' => 'required|unique:suppliers',
            'address' =>'required',
            'photo' =>'required|mimes:png,jpg',
        ]);
         //image upload image

         $file_name = auth()->id() . '-' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
         $img = Image::make($request->file('photo'));
         $img->save(base_path('public/upload/supplier_image/' . $file_name), 80);

        //Insert data with supplier

        $supplier = new Supplier;
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->type = $request->type;
        $supplier->shopName = $request->shopName;
        $supplier->account_holder = $request->account_holder;
        $supplier->account_number = $request->account_number;
        $supplier->bank_name = $request->bank_name;
        $supplier->bank_branch = $request->bank_branch;
        $supplier->city = $request->city;
        $supplier->address = $request->address;
        $supplier->photo = $file_name;
        $supplier->save();
        $notification = array(
            'message' => 'supplier Insert Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        return view('dashbord.Supplier.show',compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('dashbord.Supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' =>'required',
            'photo' =>'mimes:png,jpg',
        ]);

        //edit data with supplier

        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            'shopName' => $request->shopName,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'city' => $request->city,
            'address' => $request->address,
        ]);

        if($request->hasFile('photo')){
            //supplier image update
           unlink(base_path('public/upload/supplier_image/'.$supplier->photo));

            $file_name = auth()->id() . '-' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $img = Image::make($request->file('photo'));
            $img->save(base_path('public/upload/supplier_image/' . $file_name), 80);

            $supplier->update([
                'photo' => $file_name,
               ]);
           }
           $notification = array(
            'message' => 'supplier updated Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
         $supplier->delete();
         $notification = array(
            'message' => 'Supplier temp deleted',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

        //trashbin supplier restore
        public function restore($id)
        {
            Supplier::onlyTrashed()->find($id)->restore();
            $notification = array(
                'message' => 'Supplier restore Successfull',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }

         //trashbin Supplier permanent delete
        public function delete($id)
        {
            $Supplier_info = Supplier::onlyTrashed()->find($id);
            unlink(base_path('public/upload/supplier_image/' . $Supplier_info->photo));
            $Supplier_info->forceDelete();
            $notification = array(
                'message' => 'Supplier deleted forever',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }

}
