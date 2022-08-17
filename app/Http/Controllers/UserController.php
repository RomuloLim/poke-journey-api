<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSettingsRequest;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $repository;
    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function saveSettings(UserSettingsRequest $request)
    {
        $data = $request->validated();

        $user = $this->repository->saveSettings($data);

        return response()->json($user);
    }
}
