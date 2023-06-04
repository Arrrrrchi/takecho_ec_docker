<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Throwable;

class Authenticate extends Middleware
{
    protected $user_route = 'user.login';
    protected $admin_route = 'admin.login';
    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request)
    {
        if(! $request->expectsJson()){
            if (Route::is('admin.*')) {
                return route($this->admin_route);
            } elseif (Route::is('user.*')) {
                return route($this->user_route);
            }
        }    
    }
}
