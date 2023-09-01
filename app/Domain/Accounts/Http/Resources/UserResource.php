<?php

namespace App\Domain\Accounts\Http\Resources;

use Netsells\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Domain\Accounts\Models\User
 */
class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashed_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'administrator' => $this->administrator,
        ];
    }
}
