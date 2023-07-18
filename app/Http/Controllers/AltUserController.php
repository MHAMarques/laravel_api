<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\ShowUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\ShowUserService;
use App\Services\UpdateUserService;

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

    public function show(ShowUserRequest $request, $id)
    {
        $ShowUserService = new ShowUserService();
        return $ShowUserService->execute($id);
    }


    public function update(UpdateUserRequest $request, $id)
    {
        $UpdateUserService = new UpdateUserService();
        return $UpdateUserService->execute($request, $id);
    }
}
