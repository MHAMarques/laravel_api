<?php

namespace App\Http\Controllers;

use App\Exceptions\APIError;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;

class LoginController extends Controller
{
    public function index(LoginRequest $request)
    {
        $authService = new AuthService();
        return $authService->execute($request->all());
    }
}
