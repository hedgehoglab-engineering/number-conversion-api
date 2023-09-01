<?php

namespace Tests\Feature\Accounts;

use App\Domain\Accounts\Models\User;
use Illuminate\Testing\TestResponse;
use Laravel\Passport\Passport;
use Tests\TestCase;

class UserShowControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        Passport::actingAs($this->user);
    }

    public function test_user_can_fetch_their_info_with_alias(): void
    {
        $response = $this->getJson('/api/v1/users/me');

        $this->assertUserRepresentation($response);
    }

    public function test_user_can_fetch_their_info_with_hashed_id(): void
    {
        $response = $this->getJson('/api/v1/users/'.$this->user->hashed_id);

        $this->assertUserRepresentation($response);
    }

    public function test_user_cannot_fetch_others_with_hashed_id(): void
    {
        $otherUser = User::factory()->create();

        $response = $this->getJson('/api/v1/users/'.$otherUser->hashed_id);

        $response->assertForbidden();
    }

    private function assertUserRepresentation(TestResponse $response): void
    {
        $response->assertJson([
            'data' => [
                'id' => $this->user->hashed_id,
                'first_name' => $this->user->first_name,
                'last_name' => $this->user->last_name,
                'email' => $this->user->email,
                'administrator' => $this->user->administrator,
            ],
        ]);
    }
}
