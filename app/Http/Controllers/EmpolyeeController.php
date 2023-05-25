<?php

namespace App\Http\Controllers;

use App\Models\empolyee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class EmpolyeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empolyees_trash = empolyee::onlyTrashed()->get();
        $empolyees = empolyee::all();
        return view('dashbord.Empolyee.show',compact('empolyees','empolyees_trash'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.Empolyee.create');
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
            'nid_number'  => 'required|unique:empolyees',
            'salary' => 'required',
            'vacation' => 'required',
            'experience' => 'required',
            'city' => 'required',
            'address' =>'required',
            'photo' =>'required|mimes:png,jpg',

        ]);

        //image upload image

        $file_name = auth()->id() . '-' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
        $img = Image::make($request->file('photo'));
        $img->save(base_path('public/upload/empolyee_image/' . $file_name), 80);

        //Insert data with empolyee

        $empolyee = new empolyee;
        $empolyee->name = $request->name;
        $empolyee->email = $request->email;
        $empolyee->phone = $request->phone;
        $empolyee->nid_number = $request->nid_number;
        $empolyee->salary = $request->salary;
        $empolyee->vacation = $request->vacation;
        $empolyee->experience = $request->experience;
        $empolyee->city = $request->city;
        $empolyee->address = $request->address;
        $empolyee->photo = $file_name;
        $empolyee->save();
        $notification = array(
            'message' => 'Empolyee Insert Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(empolyee $empolyee)
    {
     //single empolyee all information show
     return view('dashbord.Empolyee.view',compact('empolyee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(empolyee $empolyee)
    {
        return view('dashbord.Empolyee.edit',compact('empolyee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'nid_number'  => 'required',
            'salary' => 'required',
            'vacation' => 'required',
            'experience' => 'required',
            'city' => 'required',
            'address' =>'required',
            'photo' =>'mimes:png,jpg',

        ]);

        empolyee::find($id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'nid_number' => $request->nid_number,
        'salary' => $request->salary,
        'vacation' => $request->vacation,
        'experience' => $request->experience,
        'city' => $request->city,
        'address' => $request->address,
       ]);


       $empolyee_photo  = empolyee::find($id)->value('photo');
       if($request->hasFile('photo')){
        //product image update
       unlink(base_path('public/upload/empolyee_image/'.$empolyee_photo));

        $file_name = auth()->id() . '-' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
        $img = Image::make($request->file('photo'));
        $img->save(base_path('public/upload/empolyee_image/' . $file_name), 80);

        empolyee::find($id)->update([
            'photo' => $file_name,
           ]);
       }

        $notification = array(
            'message' => 'Empolyee Updated Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }


     /**
     * restore the specified resource from storage.
     */
    public function restore( $id)
    {
        //Trashed empolyee restore
        empolyee::onlyTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Empolyee restore Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(empolyee $empolyee)
    {
         $empolyee->delete();
         $notification = array(
            'message' => 'Empolyee temp deleted',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }


     /**
     * delete the specified resource from storage.
     */
    public function delete($empolyee)
    {
       $empolyee_info = empolyee::onlyTrashed()->find($empolyee);
       unlink(base_path('public/upload/empolyee_image/' . $empolyee_info->photo));
       $empolyee_info->forceDelete();
       $notification = array(
            'message' => 'Empolyee  deleted  forever',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);


    }




}
