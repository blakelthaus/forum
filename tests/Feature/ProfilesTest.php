<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProfilesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function test_a_user_has_a_profile()
    {
        $user = create('App\User');

        $this->get("/forum/profiles/" . $user->name)
            ->assertSee($user->name);
    }

    /** @test */
    public function test_profile_displays_user_threads()
    {
        $user = create('App\User');

        $thread = create('App\Thread', ['user_id' => $user->id]);

        $this->get("/forum/profiles/" . $user->name)
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
