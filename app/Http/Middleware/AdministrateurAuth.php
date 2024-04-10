<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Administrateur;
use Illuminate\Validation\Rules\Password;


class AdministrateurAuth
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle(Request $request,Closure $next)
    {
        $validated = $request->validate([
            'login' => 'bail|string|required|max:255',
            'password' => ['bail','string','required','max:255',Password::min(8)],
        ]);

        $administrateur = Administrateur::where('login', $validated['login'])->first();
        if($administrateur->IsAuth($validated['password'])) {
            $request->merge([
                'idCreateur' => $administrateur->getId()
            ]);

            return $next($request);
        }        
        abort(401);        
    }
}
