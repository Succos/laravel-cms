<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class ApiHandler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
//        if ($e instanceof QueryException) {
        // ajax 404 json feedback
//            if ($request->ajax()) {
//                return response()->json(['error' => 'Not Found'], 404);
//            }
        // normal 404 view page feedback
        $data = [
            'code'   => 1,
            'msg'    => "保存失败",
            'data'  => '这是默认的空data',
        ];
        return response()->json($data,200)->setEncodingOptions(JSON_UNESCAPED_UNICODE);

        // }
    }
}
