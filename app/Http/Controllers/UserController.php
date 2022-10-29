<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use App\Models\Menu;
use App\Models\Menu_user;

class UserController extends Controller
{

    public function index()
    {
        try { 
            $table = User::orderBy('create_date','DESC')->paginate(10);
            $menu = \SidebarMenu::get_menu();
            \LogActivity::addToLog('List User');

            return view('user.index',compact('table','menu'));
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);


        }
    }

    public function create()
    {
        try {             
            $menu = \SidebarMenu::get_menu();
            $select_menu = Menu::all();
            \LogActivity::addToLog('Create User');

            return view('user.create',compact('menu','select_menu'));
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            \LogActivity::addToLog('Save User');

            $table = new User();
            
            $table->name_user       = $request->name_user;
            $table->username        = $request->username;
            $table->password        = bcrypt($request->password);
            $table->email           = $request->email;
            $table->no_hp           = $request->no_hp;
            $table->wa              = $request->wa;
            $table->pin             = $request->pin;
            $table->id_jenis_user   = $request->id_jenis_user;
            $table->status_user     = $request->status_user;
            $table->create_date     = date('Y-m-d', strtotime('now'));

            if ($table->save()) {

                foreach($request->menu_user as $row){
                    $menu_user = new Menu_user();
                    $menu_user->id_user = $table->id;
                    $menu_user->menu_id = $row;
                    $menu_user->save();
                }

                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Save Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-user');

            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try { 

            \LogActivity::addToLog('Edit User');

            $table = User::find($id);
            $menu = \SidebarMenu::get_menu();;
            $select_menu = Menu::all();
            
            $selected_menu = $this->get_selected_menu($id);

            return view('user.edit', compact('table','menu','select_menu','selected_menu'));
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }        
    }

    public function update(Request $request, $id)
    {
        try {
            \LogActivity::addToLog('Update User');

            $table = User::findOrFail($id);
            
            $table->name_user       = $request->name_user;
            $table->username        = $request->username;
            if(!empty($request->password)){
                $table->password        = bcrypt($request->password);
            }
            $table->email           = $request->email;
            $table->no_hp           = $request->no_hp;
            $table->wa              = $request->wa;
            $table->pin             = $request->pin;
            $table->id_jenis_user   = $request->id_jenis_user;
            $table->status_user     = $request->status_user;

            if ($table->save()) {
                if(Menu_user::where('id_user', $id)->delete()){
                    foreach($request->menu_user as $row){
                        $menu_user = new Menu_user();
                        $menu_user->id_user = $id;
                        $menu_user->menu_id = $row;
                        $menu_user->save();
                    } 
                }

                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Update Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-user');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            \LogActivity::addToLog('Delete User');

            $table = User::findOrFail($id);

            if ($table->delete()) {
                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Delete Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-user');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function get_selected_menu( $id ){

        $selected = Menu_user::where('id_user', $id)->get();

        if(count($selected) > 0){

            foreach($selected as $row){
                $rows[] = $row->menu_id;
            }

        }
        return $rows;

    }
}
