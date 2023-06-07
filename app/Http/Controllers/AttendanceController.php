<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\empolyee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $att = DB::table('attendances')->select('edit_date')->groupBy('edit_date')->get();
        return view('dashbord.Attendance.show',compact('att'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empolyee_info = empolyee::all();
        return view('dashbord.Attendance.create',compact('empolyee_info'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'attendances' => 'required',
        ]);

       $Attendance = Attendance::where('date',$request->date)->first();
            if ($Attendance) {
                $notification = array(
                    'message' => 'Alrady Insert Attendances',
                    'alert-type' => 'warning'
                    );
                   return redirect()->back()->with($notification);
            }else{
                foreach ($request->empolyee_id as $id) {
                    $data[]=[
                       'empolyee_id'=>$id,
                       'attendances'=>$request->attendances[$id],
                       'date'=>$request->date,
                       'edit_date'=>date("d_m_y")
                    ];
                }
                    $att = DB::table('attendances')->insert($data);

                    if ($att) {
                        $notification = array(
                            'message' => 'Attendances Insert successfull',
                            'alert-type' => 'success'
                            );
                           return redirect()->back()->with($notification);
                    }else{
                        $notification = array(
                            'message' => 'please try again',
                            'alert-type' => 'warning'
                            );
                           return redirect()->back()->with($notification);
                }
            }



    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($edit_date)
    {
      $att = DB::table('attendances')->join('empolyees','attendances.empolyee_id','empolyees.id')->where('edit_date',$edit_date)->get();
      return view('dashbord.Attendance.edit',compact('att'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_attendance(Request $request)
    {
        foreach ($request->id as $id) {
            $data=[
               'attendances'=>$request->attendances[$id],
            ];
          $Att =  Attendance::where(['date' =>$request->date,'empolyee_id' =>$id])->first();
          $Att->update($data);
        }
        if ($Att) {
            $notification = array(
                'message' => 'Attendances Updated',
                'alert-type' => 'success'
                );
               return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Error',
                'alert-type' => 'warning'
                );
               return redirect()->back()->with($notification);
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
