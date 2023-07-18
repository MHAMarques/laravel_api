<?php

namespace App\Http\Middleware;

use App\Exceptions\APIError;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidEmail
{
    public function handle(Request $request, Closure $next): Response
    {
        $userEmail = $request['email'];
        $user = User::where('email', $userEmail)->first();
        if (!is_null($user)) {
            throw new APIError("Email already registered.", 409);
        }
        return $next($request);
    }
}
