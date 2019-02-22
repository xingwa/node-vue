<?php

namespace App\Http\Middleware;
use Closure;
class CorsMiddleware
{

    public function handle($request, Closure $next)
    {

        //设置多语言
        app('translator')->setLocale($request->input('lang','zh-CN'));
        
        //设置response头部
        $headers = [
            'Access-Control-Expose-Headers' => 'Authorization',
            'Cache-Control' => 'no-store',
            'Access-Control-Allow-Origin' => getenv('ACCESS_CONTROL_ALLOW_ORIGIN'),
            'Access-Control-Allow-Methods' => getenv('ACCESS_CONTROL_ALLOW_METHODS'),
            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Max-Age' => '86400',
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With'
        ];
      
        
        if ($request->isMethod('OPTIONS')) {
            return response()->json('{"method":"OPTIONS"}', 200, $headers);
        }
        
        $response = $next($request);
        foreach ($headers as $key => $value) {
            $response->header($key, $value,true);
        }
        
        return $response;
    }
}