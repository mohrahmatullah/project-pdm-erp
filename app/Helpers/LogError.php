<?php

namespace App\Helpers;
use Request;
use App\Models\I_error_application as LogErrorModel;


class LogError
{
    public static function addToLog($exception)
    {

    // $data = [
        //     'id'      => $this->createUniversalUniqueIdentifier(),
        //     'file'    => $exception->getFile(),
        //     'line'    => $exception->getLine(),
        //     'message' => $exception->getMessage(),
        //     'trace'   => $exception->getTraceAsString(),
        // ];

        //   $dataArr =['id'     => $data['id'],
        //      'file'           => $data['file'],
        //      'error_summary'  => 'Line '.$data['line'].' '.$data['message'],
        //      'log_trace'      => $data['trace']
        //      ];
        // ErrorLog::create($dataArr);

        // Checks if a user has logged in to the system, so the error will be recorded with the user id

        $data = array(
            'id_user' => auth()->check() ? auth()->user()->id : 0,
            // 'error_date' => date('Y-m-d', strtotime('now')),
            'modules' => $exception->getFile(),
            'error_line'    => $exception->getLine(),
            'error_message' => $exception->getMessage(),
            'create_date' => date('Y-m-d', strtotime('now'))
            // 'trace' => $exception->getTraceAsString(),
        );

        LogErrorModel::create($data);
    }


    public static function logErrorLists()
    {
    	return LogErrorModel::orderby('error_id','DESC')->paginate(20);
    }


}