<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{

    protected $entity;

    public function __construct()
    {
        $this->entity = new User();
    }

    public function saveSettings($request)
    {
        $userSettings = $this->entity->find($request['user_id'])->settings();

        $request['sprites_style'] = $request['sprites_style'] ?? null;

        if ($userSettings->exists())
            return $userSettings->update($request);

        return $userSettings->create($request);
    }

}
