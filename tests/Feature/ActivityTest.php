<?php

namespace Tests\Unit;

use App\Activity;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActivityTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function test_it_records_activity_when_thread_is_created()
    {
        //sign in and create a thread
        $this->signIn();
        $thread = create('App\Thread');

        //when a thread is created we want to see if we store activity on it. (Which we should)
        $this->assertDatabaseHas('activities', [
            'type' => 'created_thread',
            'user_id' => auth()->id(),
            'subject_id' => $thread->id,
            'subject_type' => 'App\Thread',
        ]);

        //since we know the table is empty when we started, then there should only be activity for the thread we created
        $activity = Activity::first();

        //now we just want to make sure that activity has the same information as our thread.
        $this->assertEquals($activity->subject->id, $thread->id);
    }

    /** @test */
    public function test_it_records_activity_when_reply_is_created()
    {
        $this->signIn();

        $reply = create('App\Reply');

        $this->assertEquals(2, Activity::count());

    }
}
