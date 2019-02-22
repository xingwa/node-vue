<?php

namespace App\Exceptions;

use ErrorException;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
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
    public function render($request, Exception $exception)
    {
        switch($exception){
            //使用类型运算符 instanceof 判断异常(实例)是否为 ModelNotFoundException
            case ($exception instanceof NotFoundHttpException):
                //进行异常处理
                return $this->renderException($request,$exception);
                break;
            case ($exception instanceof ErrorException):
                //进行异常处理
                return $this->renderException($request,$exception);
                break;
                
            default:
                return parent::render($request, $exception);
        }
        //return parent::render($request, $exception);
    }
    
    //处理异常
    protected function renderException($request,$e)
    {
        switch ($e){
            case ($e instanceof NotFoundHttpException):
                //自定义处理异常，此处我们返回一个404页面
                return display404();
                break;
            case ($e instanceof ErrorException):
                //自定义处理异常，此处我们返回一个404页面
                return display500($e->getMessage());
                break;
            default:
                return parent::render($request, $exception);
        }
        
    }
}
