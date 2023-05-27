<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers_trash = Customer::onlyTrashed()->get();
        $customers = Customer::all();
        return view('dashbord.Customer.index', compact('customers','customers_trash'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.Customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:empolyees',
            'phone' => 'required|unique:empolyees',
            'address' =>'required',
            'photo' =>'required|mimes:png,jpg',
        ]);

         //image upload image

         $file_name = auth()->id() . '-' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
         $img = Image::make($request->file('photo'));
         $img->save(base_path('public/upload/customer_image/' . $file_name), 80);

        //Insert data with customer

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->shopName = $request->shopName;
        $customer->account_holder = $request->account_holder;
        $customer->account_number = $request->account_number;
        $customer->bank_name = $request->bank_name;
        $customer->bank_branch = $request->bank_branch;
        $customer->city = $request->city;
        $customer->address = $request->address;
        $customer->photo = $file_name;
        $customer->save();
        $notification = array(
            'message' => 'customer Insert Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('dashbord.Customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' =>'required',
            'photo' =>'mimes:png,jpg',
        ]);
        $customer->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'shopName' => $request->shopName,
            'email' => $request->email,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'city' => $request->city,
            'address' => $request->address,
        ]);


        if($request->hasFile('photo')){
            //customer image update
           unlink(base_path('public/upload/customer_image/'.$customer->photo));

            $file_name = auth()->id() . '-' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $img = Image::make($request->file('photo'));
            $img->save(base_path('public/upload/customer_image/' . $file_name), 80);

            $customer->update([
                'photo' => $file_name,
               ]);
           }
           $notification = array(
            'message' => 'customer updated Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)//delete select single customer tmp
    {
         $customer->delete();
         $notification = array(
            'message' => 'customer temp deleted',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    //trashbin customer restore
    public function restore($id)
    {
        Customer::onlyTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Customer restore Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
    //trashbin customer permanent delete
    public function delete($id)
    {
        $Customer_info = Customer::onlyTrashed()->find($id);
        unlink(base_path('public/upload/customer_image/' . $Customer_info->photo));
        $Customer_info->forceDelete();
        $notification = array(
             'message' => 'Customer deleted forever',
             'alert-type' => 'warning'
         );
         return redirect()->back()->with($notification);
    }
}
