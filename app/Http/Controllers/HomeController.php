<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\View;
use Session;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $menu = \SidebarMenu::get_menu();
            \LogActivity::addToLog('Dashboard');

            return view('home.index', compact('menu'));
        }
        catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }        
    }


    public function getPaginator($items, $request)
    {
        $total = count($items); // total count of the set, this is necessary so the paginator will know the total pages to display
        $page = $request->page ? $request->page : 1; // get current page from the request, first page is null
        $perPage = 5; // how many items you want to display per page?
        $offset = ($page - 1) * $perPage; // get the offset, how many items need to be "skipped" on this page

        $items = array_slice($items, $offset, $perPage); // the array that we actually pass to the paginator is sliced

        return new LengthAwarePaginator($items, $total, $perPage, $page, [
            'path' => $request->url(),
            'query' => $request->query()
        ]);
    }

    public function logActivityLists(){
        try {            
            $menu = \SidebarMenu::get_menu();
            \LogActivity::addToLog('List User Activity');
            $table = \LogActivity::logActivityLists();

            return view('user_activity.index', compact('table','menu'));
        }
        catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        } 

    }

    public function errorApplication(){
        try {
            $menu = \SidebarMenu::get_menu();
            \LogActivity::addToLog('List Error Application');
            $table = \LogError::logErrorLists();

            return view('error-application.index', compact('table','menu'));
        }
        catch (\Exception $e) {
            \LogError::addToLog($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

}
