<?php

namespace App\Http\Middleware;

use App\Exceptions\APIError;
use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthJWT
{
    public function handle(Request $request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
            return $next($request);
        } catch (JWTException $error) {
            if ($error->getMessage() === 'The token could not be parsed from the request') {
                throw new APIError('Missing Token', 403);
            }

            if ($error instanceof TokenInvalidException) {
                throw new APIError('Token not acceptable', 406);
            }

            if ($error instanceof TokenExpiredException) {
                throw new APIError('New Token is required', 426);
            }

            throw new APIError($error->getMessage(), 500);
        }
    }
}
