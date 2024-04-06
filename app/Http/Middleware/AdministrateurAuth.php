<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministrateurAuth
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle(Request $request,Closure $next)
    {
        $input = $request->all();
        if (!empty($input['login']) && !empty($input['password'])) {
            $password = DB::select('SELECT password FROM administrateur WHERE login = :login', ['login'=> $input['login']]);
            if (password_verify((string) $input['password'], $password[0]->password)) {  
                return $next($request);
            }
        }
        abort(403);        
    }
}
