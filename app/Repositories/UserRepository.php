<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getAll()
    {
        return User::all();
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }

    public function store(array $data)
    {
        return User::create($data);
    }

    public function update($id, array $data)
    {
        $user = User::findOrFail($id);
        return $user->update($data);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }
}
