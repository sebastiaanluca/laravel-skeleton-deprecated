<?php

namespace App\Exceptions;

use Exception;
use GrahamCampbell\Exceptions\NewExceptionHandler;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Nwidart\Modules\Exceptions\Repositories\NoRecordsFound;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends NewExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthenticationException::class,
        AuthorizationException::class,
        HttpException::class,
        TokenMismatchException::class,
        ValidationException::class,
    ];
    
    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception
     *
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }
    
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     *
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        switch (get_class($exception)) {
            case AuthorizationException::class:
                $exception = new HttpException(401, $exception->getMessage(), $exception);
                break;
            
            case ModelNotFoundException::class:
            case NoRecordsFound::class:
                $exception = new HttpException(404, $exception->getMessage(), $exception);
                break;
            
            case ValidationException::class:
                $exception = new HttpException(422, $exception->getMessage(), $exception);
                break;
        }
        
        return parent::render($request, $exception);
    }
    
    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AuthenticationException $exception
     *
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        
        return redirect()->guest('login');
    }
}