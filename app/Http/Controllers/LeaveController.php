<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Employee;
use App\Models\Leave_type;
use Session;

class LeaveController extends Controller
{
    public function index()
    {
        try {            
            $table = Leave::orderBy('created_at', 'DESC')->paginate(10);
            $menu = \SidebarMenu::get_menu();

            \LogActivity::addToLog('List Leave');

            return view('leave.index',compact('table','menu'));
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function create()
    {
        try {
            $menu = \SidebarMenu::get_menu();

            \LogActivity::addToLog('Create Leave');
            $employee = Employee::orderBy('created_at', 'DESC')->get();
            $leave_type = Leave_type::orderBy('created_at', 'DESC')->get();

            return view('leave.create', compact('menu','employee','leave_type'));

        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function store(Request $request)
    {
        try {

            \LogActivity::addToLog('Save Leave');

            $table = new Leave();

            $table->employee_id                 = $request->employee_id;
            $table->leave_type_id               = $request->leave_type_id;
            $table->applied_on                  = date('Y-m-d');
            $table->total_leave_days            = 0;
            $table->start_date                  = $request->start_date;
            $table->end_date                    = $request->end_date;
            $table->leave_reason                = $request->leave_reason;
            $table->remark                      = $request->remark;
            $table->status                      = 'pending';
            $table->created_by                  = auth()->user()->id;

            if ($table->save()) {
                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Save Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-leave');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try{

            \LogActivity::addToLog('Edit Leave');

            $table = Leave::where('id',$id)->first();
            $menu = \SidebarMenu::get_menu();
            $employee = Employee::orderBy('created_at', 'DESC')->get();
            $leave_type = Leave_type::orderBy('created_at', 'DESC')->get();
            
            return view('leave.edit', compact('table','menu','employee','leave_type'));

        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function update(Request $request, $id)
    {
        try {
            \LogActivity::addToLog('Update Leave');

            $table = Leave::findOrFail($id);
            
            $table->employee_id                 = $request->employee_id;
            $table->leave_type_id               = $request->leave_type_id;
            $table->applied_on                  = date('Y-m-d');
            $table->total_leave_days            = 0;
            $table->start_date                  = $request->start_date;
            $table->end_date                    = $request->end_date;
            $table->leave_reason                = $request->leave_reason;
            $table->remark                      = $request->remark;
            $table->status                      = 'pending';
            $table->created_by                  = auth()->user()->id;

            if ($table->save()) {

                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Update Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-leave');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            \LogActivity::addToLog('Delete Leave');
            $table = Leave::where('id', $id)->delete();

            if ($table) {
                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Delete Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-leave');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try{

            \LogActivity::addToLog('Show Approve / Non Approve');

            $table = Leave::where('id',$id)->first();
            $menu = \SidebarMenu::get_menu();
            $employee = Employee::orderBy('created_at', 'DESC')->get();
            $leave_type = Leave_type::orderBy('created_at', 'DESC')->get();
            
            return view('leave.show', compact('table','menu','employee','leave_type'));

        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function changeaction($id)
    {

        $leave = Leave::find($id);

        $start = new \DateTime($leave->start_date);
        $end = new \DateTime($leave->end_date);
        $end->modify('+1 day');

        $interval = $end->diff($start);
        $days = $interval->days;
        $period = new \DatePeriod($start, new \DateInterval('P1D'), $end);

        $holidays = array('2016-07-22','2016-07-21');

        foreach($period as $dt) {
            $curr = $dt->format('D');
            if (in_array($dt->format('Y-m-d'), $holidays)) {
               $days--;
            }

            if ($curr == 'Sat' || $curr == 'Sun') {
                $days--;
            }
        }

        // $startDate               = new \DateTime($leave->start_date);
        // $endDate                 = new \DateTime($leave->end_date);
        // $total_leave_days        = $startDate->diff($endDate)->days;
        $leave->total_leave_days = $days;
        $leave->status           = 'Approved';

        $leave->save();

        return redirect()->route('list-leave')->with('success', __('Leave status successfully updated.'));
    }


}
