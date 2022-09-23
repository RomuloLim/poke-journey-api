<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSettingsRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository;
    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function store(Request $request)
    {
        $data = $request->all();

        return $this->repository->store($data);
    }

    public function saveSettings(UserSettingsRequest $request)
    {
        $data = $request->validated();

        $user = $this->repository->saveSettings($data);

        return response()->json($user);
    }
}
