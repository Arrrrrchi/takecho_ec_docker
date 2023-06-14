<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Throwable;

class Authenticate extends Middleware
{
    protected $user_route = 'login';
    protected $admin_route = 'admin.login';
    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request)
    {
        // ログインが必要なページへのアクセス時にはリダイレクト先のURLをセッションに保存
        if ($request->method() === 'POST' || $request->method() === 'PUT') {
            $request->session()->put('redirect_to', url()->previous());
        } else {
            $request->session()->put('redirect_to', $request->url());
        }

        // ルート名によってリダイレクト先を変更
        if(! $request->expectsJson()){
            if (Route::is('admin.*')) {
                return route($this->admin_route);
            } elseif (Route::is('*')) {
                return route($this->user_route);
            }
        }
    }
}
