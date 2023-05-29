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
        //
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
