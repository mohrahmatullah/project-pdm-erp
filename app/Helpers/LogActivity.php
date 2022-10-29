<?php

namespace App\Helpers;
use Request;
use App\Models\User_activity as LogActivityModel;


class LogActivity
{
    public static function addToLog($description)
    {
    	$log = [];
    	$log['description'] = $description;
    	// $log['url'] = Request::fullUrl();
    	// $log['method'] = Request::method();
    	// $log['ip'] = Request::ip();
    	$log['create_by'] = auth()->check() ? auth()->user()->username : Null;
    	$log['create_date'] = date('Y-m-d', strtotime('now'));
    	$log['id_user'] = auth()->check() ? auth()->user()->id : 0;
    	LogActivityModel::create($log);
    }


    public static function logActivityLists()
    {
    	return LogActivityModel::paginate(20);
    }


}