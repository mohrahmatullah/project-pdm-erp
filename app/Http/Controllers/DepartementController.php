<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Branch;
use Session;

class DepartementController extends Controller
{
    public function index()
    {
        try {            
            $table = Department::orderBy('created_at', 'DESC')->paginate(10);
            $menu = \SidebarMenu::get_menu();

            \LogActivity::addToLog('List Department');

            return view('department.index',compact('table','menu'));
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function create()
    {
        try {
            $menu = \SidebarMenu::get_menu();

            \LogActivity::addToLog('Create Department');

            $branch = Branch::all();

            return view('department.create', compact('menu', 'branch'));

        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function store(Request $request)
    {
        try {

            \LogActivity::addToLog('Save Department');

            $table = new Department();

            $table->branch_id    = $request->branch_id;
            $table->name         = $request->name;
            $table->created_by   = auth()->user()->id;

            if ($table->save()) {
                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Save Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-department');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try{

            \LogActivity::addToLog('Edit Department');

            $table = Department::where('id',$id)->first();
            $menu = \SidebarMenu::get_menu();
            $branch = Branch::all();
            
            return view('department.edit', compact('table','menu','branch'));

        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function update(Request $request, $id)
    {
        try {
            \LogActivity::addToLog('Update Department');

            $table = Department::findOrFail($id);
            
            $table->branch_id    = $request->branch_id;
            $table->name         = $request->name;
            $table->created_by   = auth()->user()->id;

            if ($table->save()) {

                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Update Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-department');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            \LogActivity::addToLog('Delete Department');
            $table = Department::where('id', $id)->delete();

            if ($table) {
                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Delete Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-department');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

}
