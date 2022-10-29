<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use Session;

class DesignationController extends Controller
{
    public function index()
    {
        try {            
            $table = Designation::orderBy('created_at', 'DESC')->paginate(10);
            $menu = \SidebarMenu::get_menu();

            \LogActivity::addToLog('List Designation');

            return view('designation.index',compact('table','menu'));
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function create()
    {
        try {
            $menu = \SidebarMenu::get_menu();

            \LogActivity::addToLog('Create Designation');

            $departement = Department::all();

            return view('designation.create', compact('menu', 'departement'));

        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function store(Request $request)
    {
        try {

            \LogActivity::addToLog('Save Designation');

            $table = new Designation();

            $table->department_id   = $request->department_id;
            $table->name            = $request->name;
            $table->created_by      = auth()->user()->id;

            if ($table->save()) {
                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Save Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-designation');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try{

            \LogActivity::addToLog('Edit Designation');

            $table = Designation::where('id',$id)->first();
            $menu = \SidebarMenu::get_menu();
            $departement = Department::all();
            
            return view('designation.edit', compact('table','menu','departement'));

        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function update(Request $request, $id)
    {
        try {
            \LogActivity::addToLog('Update Designation');

            $table = Designation::findOrFail($id);
            
            $table->department_id   = $request->department_id;
            $table->name            = $request->name;
            $table->created_by      = auth()->user()->id;

            if ($table->save()) {

                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Update Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-designation');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            \LogActivity::addToLog('Delete Designation');
            $table = Designation::where('id', $id)->delete();

            if ($table) {
                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Delete Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-designation');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

}
