<?php

namespace App\Http\Repositories;

use App\Http\Traits\ApiDesignTrait;

class BaseRepository
{
    use ApiDesignTrait;

    public function auth($guard, $data)
    {
        if (auth()->guard($guard)->attempt($data)) {
            $user = auth()->guard($guard)->user();
            if ($user->deleted_at != Null) {
                return "validation error";
            } else {
                $token = $user->createToken('token-name')->plainTextToken;
                return $this->ApiResponse(200, 'Done', null, $token);
            }
        }
        return $this->ApiResponse(401, 'Bad credentials');
    }
}
