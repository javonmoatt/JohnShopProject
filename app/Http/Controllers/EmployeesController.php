<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use app\Office;

class EmployeesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        return view('employees.create')->with('employee',$employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'lastname'=> 'required',
            'firstname'=> 'required',
            'email'=> 'required',
            'officeCode' => 'required',
            'reportsTo' => 'required',
            'jobTitle' => 'required'
        ]);

        $employee = new Employee;
        $employee->lastname = $request->input('lastname');
        $employee->firstname = $request->input('firstname');
        $employee->email = $request->input('email');
        $employee->extension = "-";
        $employee->officeCode = $request->input('officeCode');
        $employee->reportsTo = $request->input('reportsTo');
        $employee->jobTitle = $request->input('jobTitle');
        $employee->save();

        return redirect('/employees')->with('success','Employee Record Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employee::find($id);
        return view('employees.show')->with('employee',$employees);
    }

    public function search()
    {
        $employees = Employee::all();
        return view('employees.search')->with('employee',$employees);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employees.edit')->with('employee',$employees);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect('/employees')->with('success','Employee Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('/employees')->with('success','Employee Record Removed');
    }
}