<?php

namespace App\Domain\Accounts\Models\Policies;

use App\Domain\Accounts\Models\User;

class UserPolicy
{
    public function view(User $authenticated, User $subject): bool
    {
        return $authenticated->is($subject);
    }
}
