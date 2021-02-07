<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
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

    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    public function render($request, Exception $e)
    {
        if($this->isHttpException($e)){
            $code = $e->getStatusCode();
            if($code == '404'){
                return response()->view('404');
            }

            if($code == '405'){
                return response()->view('405');
            }
        }
        return parent::render($request, $e);
    }
}
