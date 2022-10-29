<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Branch;
use App\Models\Employee;
use Session;

class EmployeeController extends Controller
{
    public function index()
    {
        try {            
            $table = Employee::orderBy('created_at', 'DESC')->paginate(20);
            $menu = \SidebarMenu::get_menu();

            \LogActivity::addToLog('List Employee');

            return view('employee.index',compact('table','menu'));
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function create()
    {
        try {
            $menu = \SidebarMenu::get_menu();

            \LogActivity::addToLog('Create Employee');
            $branch = Branch::all();
            $departement = Department::all();
            $designation = Designation::all();

            return view('employee.create', compact('menu','branch','designation','departement'));

        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function store(Request $request)
    {
        try {

            \LogActivity::addToLog('Save Employee');

            $table = new Employee();

            $table->branch_id       = $request->branch_id;
            $table->department_id   = $request->department_id;
            $table->designation_id  = $request->designation_id;
            $table->name            = $request->name;
            $table->created_by      = auth()->user()->id;
            $table->dob             = $request->dob;
            $table->gender          = $request->gender;
            $table->phone           = $request->phone;
            $table->address         = $request->address;
            $table->account_number  = $request->account_number;
            $table->bank_name       = $request->bank_name;
            $table->salary          = $request->salary;
            $table->is_active       = $request->is_active;

            if ($table->save()) {
                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Save Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-employee');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try{

            \LogActivity::addToLog('Edit Employee');

            $table = Employee::where('id',$id)->first();
            $menu = \SidebarMenu::get_menu();
            $branch = Branch::all();
            $departement = Department::all();
            $designation = Designation::all();
            
            return view('employee.edit', compact('table','menu','branch','designation','departement'));

        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function update(Request $request, $id)
    {
        try {
            \LogActivity::addToLog('Update Employee');

            $table = Employee::findOrFail($id);
            
            $table->branch_id       = $request->branch_id;
            $table->department_id   = $request->department_id;
            $table->designation_id  = $request->designation_id;
            $table->name            = $request->name;
            $table->created_by      = auth()->user()->id;
            $table->dob             = $request->dob;
            $table->gender          = $request->gender;
            $table->phone           = $request->phone;
            $table->address         = $request->address;
            $table->account_number  = $request->account_number;
            $table->bank_name       = $request->bank_name;
            $table->salary          = $request->salary;
            $table->is_active       = $request->is_active;

            if ($table->save()) {

                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Update Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-employee');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            \LogActivity::addToLog('Delete Employee');
            $table = Employee::where('id', $id)->delete();

            if ($table) {
                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Delete Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-employee');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    
}
