<?php

namespace App\Domain\Accounts\Http\Controllers;

use App\Domain\Accounts\Http\Resources\UserResource;
use App\Domain\Accounts\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;

class UserShowController extends Controller
{
    /**
     * @throws AuthorizationException
     */
    public function __invoke(User $user): UserResource
    {
        $this->authorize('view', $user);

        return UserResource::make($user);
    }
}
