<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class CAdmin extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'page_name' => 'Dashboard'
        ]);
    }

    public function employee()
    {
        return view('employeeList', [
            'page_name' => 'Employee List',
            'employees' => Employee::get()
        ]);
    }
    public function store_employee(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:employees,name',
            'sex' => 'required|in:male,female',
            'division' => 'required|max:50'
        ]);
        Employee::create($request->only('name', 'sex', 'division'));
        return back()->with('msg', 'employee succesfully added!');
    }
    public function update_employee(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:employees,name,' . $request->id,
            'sex' => 'required|in:male,female',
            'division' => 'required|max:50'
        ]);
        Employee::where('id', $request->id)->update($request->only('name', 'sex', 'division'));
        return back()->with('msg', 'employee succesfully updated!');
    }

    public function destroy_employee(Request $request) {
        Employee::destroy($request->id);
        return back()->with('msg', 'employee succesfully deleted!');
    }
}
