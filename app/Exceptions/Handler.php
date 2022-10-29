<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Models\I_error_application;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    // public function report(Throwable $exception)
    // {
    //     // parent::report($exception);

    //     // $data = [
    //     //     'id'      => $this->createUniversalUniqueIdentifier(),
    //     //     'file'    => $exception->getFile(),
    //     //     'line'    => $exception->getLine(),
    //     //     'message' => $exception->getMessage(),
    //     //     'trace'   => $exception->getTraceAsString(),
    //     // ];

    //     //   $dataArr =['id'     => $data['id'],
    //     //      'file'           => $data['file'],
    //     //      'error_summary'  => 'Line '.$data['line'].' '.$data['message'],
    //     //      'log_trace'      => $data['trace']
    //     //      ];
    //     // ErrorLog::create($dataArr);

    //     // Checks if a user has logged in to the system, so the error will be recorded with the user id
    //     $userId = 0;
    //     if (Auth::user()) {
    //         $userId = Auth::user()->id;
    //     }

    //     $data = array(
    //         'id_user' => $userId,
    //         // 'code' => $exception->getCode(),
    //         'modules' => $exception->getFile(),
    //         'error_line'    => $exception->getLine(),
    //         'error_message' => $exception->getMessage()
    //         // 'trace' => $exception->getTraceAsString(),
    //     );

    //     I_error_application::create($data);
    // }

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            \LogError::addToLog($e);
        });
    }
}
