<?php

namespace App\Http\Controllers;

use App\Exceptions\APIError;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function store(CreateUserRequest $request)
    {
        $storeUser = User::create($request->validated());
        return UserResource::make($storeUser);
    }

    public function show(User $user)
    {
        return UserResource::make($user);
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return UserResource::make($user);
    }

    public function destroy(DeleteUserRequest $request, User $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'The User is gone'
        ], 410);
    }
}
