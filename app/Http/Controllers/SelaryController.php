<?php

namespace App\Http\Controllers;

use App\Models\empolyee;
use App\Models\Selary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SelaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $selarys = Selary::all();
        return view('dashbord.Selary.show', compact('selarys'));
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
            'advanch' => 'required',
        ]);

     $empolyee =   empolyee::where('email',$request->email)->first();

     $empolyee_id = $empolyee->id;
     $salary_date = $request->salary_date;

     $advance_salary  = DB::table('selaries')->where('empolyee_id',$empolyee_id)->where('salary_date',$salary_date)->first();

         if (!empty($empolyee)) {
            if ($advance_salary === null) {

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

            } else {
                $notification = array(
                    'message' => 'alrady pay this month advance salary',
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
    public function edit($id)
    {
        $selary = Selary::where('id',$id)->first();
        return view('dashbord.Selary.edit',compact('selary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'salary_date' => 'required',
            'advanch' => 'required',
        ]);
        $selary = Selary::where('id',$id)->first();
        $due_selary = $selary->selary - $request->advanch;
         Selary::find($id)->update([
            'salary_date' => $request->salary_date,
            'advanch' => $request->advanch,
            'due' => $due_selary,
        ]);
        $notification = array(
            'message' => 'Advanch selary update Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Selary::find($id)->delete();
        $notification = array(
            'message' => 'Advanch selary info temp delete',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
}
