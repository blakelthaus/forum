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
        $this->signIn();

        $thread = create('App\Thread', ['user_id' => auth()->id()]);

        $this->get("/forum/profiles/" . auth()->user()->name)
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
