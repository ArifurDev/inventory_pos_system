<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::all();
        return view('dashbord.Setting.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashbord.Setting.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $setting_count =  Setting::all()->count();
      if ($setting_count == '0') {
               $request->validate([
                'logo' => 'mimes:png',
               ]);
            //logo upload image

             $file_name = auth()->id() . '-' . time() . '.' . $request->file('logo')->getClientOriginalExtension();
             $img = Image::make($request->file('logo'));
             $img->save(base_path('public/upload/Setting_image/' . $file_name), 80);

            $data = new Setting;
            $data->address = $request->address;
            $data->phone = $request->phone;
            $data->city = $request->city;
            $data->logo = $file_name;
            $data->name = $request->name;
            $data->color = $request->color;
            $data->save();
            $notification = array(
                'message' => 'Setting system info insert Successfull',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
      } else {
        $notification = array(
            'message' => 'sorry alrady info save',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

      }


    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('dashbord.Setting.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $setting->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'city' => $request->city,
            'name' => $request->name,
            'color' => $request->color,
        ]);

        if ($request->hasFile('logo')) {
             //system logo validation if set logo
             $request->validate([
                'logo' => 'mimes:png'
               ]);
            //Setting old logo remove
            unlink(base_path('public/upload/Setting_image/'.$setting->logo));
            //update a new logo
            $file_name = auth()->id() . '-' . time() . '.' . $request->file('logo')->getClientOriginalExtension();
            $img = Image::make($request->file('logo'));
            $img->save(base_path('public/upload/Setting_image/' . $file_name), 80);
            $setting->update([
                'logo' => $file_name,
            ]);

        }
        $notification = array(
            'message' => 'Setting system info Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
