<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Menu_user;
use Session;

class MenuController extends Controller
{
    public function index()
    {
        try {            
            $table = Menu::orderBy('create_date', 'DESC')->paginate(10);
            $menu = \SidebarMenu::get_menu();

            \LogActivity::addToLog('List Menu');

            return view('menu.index',compact('table','menu'));
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function create()
    {
        try {
            $table = Menu::where('parent_id', 0)->get();
            $menu = \SidebarMenu::get_menu();

            \LogActivity::addToLog('Create Menu');

            return view('menu.create', compact('table','menu'));

        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function store(Request $request)
    {
        try {

            \LogActivity::addToLog('Save Menu');

            $table = new Menu();

            $table->id_level         = $request->id_level;
            $table->menu_name        = $request->menu_name;
            $table->menu_link        = $request->menu_link;
            $table->menu_icon        = $request->menu_icon;
            $table->parent_id        = $request->parent_id;
            $table->create_date      = date('Y-m-d', strtotime('now'));

            if ($table->save()) {
                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Save Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-menu');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try{

            \LogActivity::addToLog('Edit Menu');

            $table = Menu::where('menu_id',$id)->first();
            $table_menu = Menu::where('parent_id', 0)->get();
            $menu = \SidebarMenu::get_menu();
            
            return view('menu.edit', compact('table','table_menu','menu'));

        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function update(Request $request, $id)
    {
        try {
            \LogActivity::addToLog('Update Menu');

            $data = [
                        'id_level'         => $request->id_level,
                        'menu_name'        => $request->menu_name,
                        'menu_link'        => $request->menu_link,
                        'menu_icon'        => $request->menu_icon,
                        'parent_id'        => $request->parent_id
                    ];
            $table = Menu::where('menu_id', $id)->update($data);

            $alert_toast = 
            [
                'title' => 'Operation Successful',
                'text'  => 'Successfully Update Data.',
                'type'  => 'success',
            ];
            Session::flash('alert_toast', $alert_toast);
            return redirect()->route('list-menu');
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            \LogActivity::addToLog('Delete Menu');
            $table = Menu::where('menu_id', $id)->delete();

            if ($table) {
                Menu_user::where(['id_user' => auth()->user()->id,'menu_id' => $id])->delete();
                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Delete Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('list-menu');
            }
        } catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

}
