<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /**@test*/
    function test_guests_may_not_post_threads()
    {
        //turn exception handling on
        $this->withExceptionHandling();

        //can we view the create threads page?
        $this->get('/forum/threads/create')
            ->assertRedirect('forum/login');

        //can we post to the threads create function?
        $this->post('/forum/threads')
            ->assertRedirect('forum/login');
    }

    /**@test*/
    public function test_an_authenticate_user_can_create_new_forum_threads()
    {

        //given we have a signed in user
        $this->signIn();
        //when we hit the endpoint to create a new thread
        $thread = make('App\Thread');
        $response = $this->post('/forum/threads', $thread->toArray());

        //then we visit the thread page
        $this->get($response->headers->get('Location'))
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }

    /** @test */
    public function test_at_thread_requires_a_title()
    {
        $this->publishThread(['title' => null])
            ->assertSessionHasErrors('title');

    }

    /** @test */
    public function test_a_thread_requires_a_body()
    {
        $this->publishThread(['body' => null])
            ->assertSessionHasErrors('body');
    }

    /** @test */
    public function test_a_thread_requires_a_valid_channel()
    {
        factory('App\Channel', 2)->create();

        $this->publishThread(['channel_id' => null])
            ->assertSessionHasErrors('channel_id');

        $this->publishThread(['channel_id' => 999])
            ->assertSessionHasErrors('channel_id');
    }

    /** @test */
    public function test_authorized_users_can_delete_threads()
    {
        $this->signIn();

        $thread = create('App\Thread', ['user_id' => auth()->id()]);
        $reply = create('App\Reply', ['thread_id' => $thread->id]);

        $response = $this->json('DELETE', $thread->path());

        $response->assertStatus(200);

        $this->assertDatabaseMissing('threads', ['id' => $thread->id]);
        $this->assertDatabaseMissing('replies', ['id' => $reply->id]);
    }

    /** @test */
    public function test_unauthorized_users_cannot_delete_threads()
    {
        $this->withExceptionHandling();

        $thread = create('App\Thread');

        $this->delete($thread->path())->assertRedirect('/forum/login');

        $this->signIn();
        $this->delete($thread->path())->assertStatus(403);

    }

    public function publishThread($overides = [])
    {
        $this->withExceptionHandling()->signIn();

        $thread = make('App\Thread', $overides);

        return $this->post('/forum/threads', $thread->toArray());

    }
}
