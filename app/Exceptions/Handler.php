<?php

namespace App\Exceptions;

use Exception;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;


class Handler extends ExceptionHandler
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
    public function render($request, Exception $exception)
    {
        // try {

        //     if (! $user = JWTAuth::parseToken()->authenticate()) {
        //         return response()->json(['code' => '401', 'user_not_found']);
        //     }
    
        // } catch (TokenBlacklistedException $e) {
    
        //     return response()->json(['code' => '401', 'token_expired' => 'Your token in blacklist']);
    
        // }catch (TokenExpiredException $e) {
    
        //     return response()->json([ 'code' => '401', 'token_expired' => 'Your token has been expired']);
    
        // } catch (TokenInvalidException $e) {
    
        //     return response()->json(['code' => '401',  'token_invalid' => 'Invalid Token']);
    
        // } catch (JWTException $e) {
    
        //     return response()->json(['code' => '401',  'token_absent' => 'Token is missing']);
    
        // }
        
        return parent::render($request, $exception);
    }
}