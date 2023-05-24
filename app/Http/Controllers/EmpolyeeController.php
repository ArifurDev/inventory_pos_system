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
        //
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
        $empolyee->salary = $request->salary;
        $empolyee->vacation = $request->vacation;
        $empolyee->experience = $request->experience;
        $empolyee->city = $request->city;
        $empolyee->address = $request->address;
        $empolyee->photo = $file_name;
        $empolyee->save();
        return redirect()->back()->withSuccess('Empolyee Insert Successfull');

    }

    /**
     * Display the specified resource.
     */
    public function show(empolyee $empolyee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(empolyee $empolyee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, empolyee $empolyee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(empolyee $empolyee)
    {
        //
    }
}
