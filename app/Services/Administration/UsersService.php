<?php


namespace App\Services\Administration;


use App\Models\User;

class UsersService
{
    public function getAllUsers()
    {
        return User::all();
    }
}
