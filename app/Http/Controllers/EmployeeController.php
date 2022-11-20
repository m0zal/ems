<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Notifications\NewEmployeeNotification;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees       =       Employee::all();

        return view('employees/index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name'        =>          'required',
            'last_name'         =>          'required',
            'birthdate'         =>          'required',
            'email'             =>          'required|email|unique:employees,email,'.$employee->id,
            'address'            =>          'required',
            
        ]);

        $input                   =           $request->all();
        $input['full_name']      =           $input['first_name'] . " ".$input['last_name'];
        $employee                 =           Employee::create($input);
        $employee->notify(new NewEmployeeNotification($employee));

        return back()->with('success', 'Record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees/show', compact('employee'));
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
        return view('employees/update', compact('employee'));
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
        $employee = Employee::findOrFail($id);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees,email,'.$employee->id,
            'address' => 'required',
            'birthdate' => 'required',
        ]);
        
        $employee->fill($request->post())->save();
        
        return redirect()->route('employees.index')->with('success','Employee has been created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    {
        $employee = Employee::findOrFail($id);

        $employee->delete();
        return redirect()->route('employees.index')->with('success','Employee has been deleted successfully');
    }
}
