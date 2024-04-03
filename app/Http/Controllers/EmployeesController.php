<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Http\Requests\EmployeeRequest;

class EmployeesController extends Controller
{
    public function __construct()
    {
    }

    function index()
    {
        $employees = Employee::simplePaginate(5);
        return view('employees.index',compact('employees'));
    }

    public function show($id)
    {
        $employee = Employee::with(['department'])->findOrFail($id);

        return view('employees.show', compact('employee'));
    }

    public function create()
    {
        $departments = Department::get();
        return view('employees.create',compact('departments'));
    }

    public function store(EmployeeRequest $request)
    {
        $file = $request->file('photo');

        $filePath = $file->store('uploads/employee', 'public');

        Employee::create([
            'name' => $request->name,
            'department_id' => $request->department_id,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'email' => $request->email,
            'salary' => $request->salary,
            'photo' => $filePath,
            'status' => 1,
        ]);

        return redirect()->route('employees')->with('success', 'Employee successfully stored.');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::get();

        return view('employees.edit', compact('departments','employee'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:50',
            'department_id'=>'required',
            'dob'=>'required',
            'phone'=>'required|numeric',
            'email'=>'required|email',
            'salary'=>'required|numeric',
        ]);

        $employee = Employee::findOrFail($id);


        if($request->file('photo'))
        {
            $file = $request->file('photo');
            $filePath = $file->store('uploads/employee', 'public');

            $employee->update([
                'name' => $request->name,
                'department_id' => $request->department_id,
                'dob' => $request->dob,
                'phone' => $request->phone,
                'email' => $request->email,
                'salary' => $request->salary,
                'photo' => $filePath,
            ]);
        }
        else
        {
            $employee->update([
                'name' => $request->name,
                'department_id' => $request->department_id,
                'dob' => $request->dob,
                'phone' => $request->phone,
                'email' => $request->email,
                'salary' => $request->salary,
            ]);
        }
        return redirect()->route('employees')->with('success', 'Employee successfully Updated.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return redirect()->route('employees')->with('success', 'Employee successfully Deleted.');
    }
}
