<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $expense = Expense::all();
       return view('dashbord.Expense.show',compact('expense'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.Expense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            '*' => "required"
           ]);

          $data = new Expense;

          $data->amount = $request->amount;
          $data->date = $request->date;
          $data->note = $request->note;
          $data->save();
          $notification = array(
              'message' => 'Expense Add Successfull',
              'alert-type' => 'success'
          );
          return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        return view("dashbord.Expense.edit",compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            '*' => "required"
        ]);

        $expense->update([
            'amount' => $request->amount,
            'date' => $request->date,
            'note' => $request->note,
        ]);
        $notification = array(
            'message' => 'Expense Update Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        $notification = array(
            'message' => 'Expense Deleted Forever',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
}
