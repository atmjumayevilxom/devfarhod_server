<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Resources\UserResource;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_client_can_get_all_users()
    {
        $users = User::factory()->count(3)->create();
        $resource = UserResource::collection($users);

        $response = $this->get(route('users.index'));

        $response
            ->assertStatus(200)
            ->assertResource($resource);
    }
}
