<?php

namespace App\Services;

use App\Exceptions\APIError;

class AuthService
{
    public function execute(array $data)
    {
        if (!$token = auth()->attempt($data)) {
            throw new APIError('Email ou senha incorretos', 401);
        }

        return $this->responseToken($token);
    }

    private function responseToken($token)
    {
        return response()->json([
            'token' => $token,
            'user' => auth()->user()
        ]);
    }
}
