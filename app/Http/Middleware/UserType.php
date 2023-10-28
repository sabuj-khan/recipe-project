<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->cookie('token');
        $userCheck = JWTToken::verifyToken($token);
        if ($userCheck->userType == 'author') {
            return redirect()->route('home');
        }else{
            return $next($request);
        }
    }
}
