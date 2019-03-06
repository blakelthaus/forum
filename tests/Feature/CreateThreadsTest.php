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
        $this->get('/threads/create')
            ->assertRedirect('/login');

        //can we post to the threads create function?
        $this->post('/threads')
            ->assertRedirect('/login');
    }

    /**@test*/
    public function test_an_authenticate_user_can_create_new_forum_threads()
    {

        //given we have a signed in user
        $this->signIn();
        //when we hit the endpoint to create a new thread
        $thread = make('App\Thread');
        $this->post('/threads', $thread->toArray());
        //then we visit the thread page
        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
