<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipatesInForumTest extends TestCase
{
    use DatabaseMigrations;

    function test_unauthenticated_users_may_not_add_replies()
    {
        $this->expectException('Illuminate\Database\Eloquent\ModelNotFoundException');

        $this->post('/threads/some-channel/1/replies', []);
    }

    /** @test */
    function test_an_authenticated_user_may_participate_in_forum_thread()
    {
        $this->signIn();
        $thread = create('App\Thread');
        $reply = create('App\Reply', ['thread_id' => $thread->id]);
        dd($thread->path() . '/replies');
        $this->post($thread->path() . '/replies', $reply->toArray());

        $this->get($thread->path())
            ->assertSee($reply->body);
    }
}
