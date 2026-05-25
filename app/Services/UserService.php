<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * check user
     * @param $username
     * @param $password
     * @return array
     */
    public function login($username, $password): array
    {
        $user = User::where('username', $username)->first();
        if (!$user) {
            return [
                'error' => true,
                'type' => 'username'
            ];
        }
        if (!Hash::check($password, $user->password)) {
            return [
                'error' => true,
                'type' => 'password'
            ];
        }

        $token = $user->createToken('api_token')->plainTextToken;

        return [
            'error' => false,
            'user' => $user,
            'token' => $token
        ];
    }

    public function allUsers()
    {
        return User::all();
    }

    public function userDetail($id)
    {
        return User::find($id);
    }
}
