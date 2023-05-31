<?php

namespace App\Http\Controllers;

use App\Models\empolyee;
use App\Models\Selary;
use Illuminate\Http\Request;

class SelaryController extends Controller
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
        $empolyee =  empolyee::all();
        return view('dashbord.Selary.create',compact('empolyee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'salary_date' => 'required',
        ]);

     $empolyee =   empolyee::where('email',$request->email)->first();

         if (!empty($empolyee)) {
            if ($empolyee->salary >= $request->advanch) {

                $due_selary =$empolyee->salary - $request->advanch;
                $Selary = new Selary;
                $Selary->empolyee_id = $empolyee->id;
                $Selary->name = $empolyee->name;
                $Selary->email = $request->email;
                $Selary->phone = $empolyee->phone;
                $Selary->selary = $empolyee->salary;

                $Selary->advanch = $request->advanch;
                $Selary->due = $due_selary;
                $Selary->salary_date = $request->salary_date;
                $Selary->status = 'advanch';
                $Selary->save();
                $notification = array(
                    'message' => 'Advanch selary pay Successfull',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message' => 'advance salary is higher than salary ',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }

         }


    }

    /**
     * Display the specified resource.
     */
    public function show(Selary $selary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Selary $selary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Selary $selary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Selary $selary)
    {
        //
    }
}
