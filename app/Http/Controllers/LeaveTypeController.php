<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave_type;
use Session;

class LeaveTypeController extends Controller
{
    public function index()
    {
        try {            
            $table = Leave_type::orderBy('created_at', 'DESC')->paginate(10);
            $menu = \SidebarMenu::get_menu();

            \LogActivity::addToLog('List Leave Type');

            return view('leave_type.index',compact('table','menu'));
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function create()
    {
        try {
            $menu = \SidebarMenu::get_menu();

            \LogActivity::addToLog('Create Leave Type');

            return view('leave_type.create', compact('menu'));

        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function store(Request $request)
    {
        try {

            \LogActivity::addToLog('Save Leave Type');

            $table = new Leave_type();

            $table->title           = $request->title;
            $table->days            = $request->days;
            $table->created_by      = auth()->user()->id;

            if ($table->save()) {
                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Save Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-leave-type');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try{

            \LogActivity::addToLog('Edit Leave Type');

            $table = Leave_type::where('id',$id)->first();
            $menu = \SidebarMenu::get_menu();
            
            return view('leave_type.edit', compact('table','menu'));

        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function update(Request $request, $id)
    {
        try {
            \LogActivity::addToLog('Update Leave Type');

            $table = Leave_type::findOrFail($id);
            
            $table->title           = $request->title;
            $table->days            = $request->days;
            $table->created_by      = auth()->user()->id;

            if ($table->save()) {

                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Update Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-leave-type');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            \LogActivity::addToLog('Delete Leave Type');
            $table = Leave_type::where('id', $id)->delete();

            if ($table) {
                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Delete Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-leave-type');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
