<?php

namespace Tests\Feature;

use App\Activity;
use Carbon\Carbon;
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

    /** @test */
    function test_it_fetches_a_feed_for_any_user()
    {
        //we have a thread
        $this->signIn();
        create('App\Thread', ['user_id' => auth()->id()], 2);
        //and another thread from a week ago "BOUT A WEEK AGOOO" (we are actually just manually editing one we created for testing purposes)
        auth()->user()->activity()->first()->update(['created_at' => Carbon::now()->subWeek()]);
        //when we fetche their feed
        $feed = Activity::feed(auth()->user());
        //then it should be returned in the proper format (Grouped by date in order from newest to oldest)
        $this->assertTrue($feed->keys()->contains(
            Carbon::now()->format('Y-m-d')
        ));
        $this->assertTrue($feed->keys()->contains(
            Carbon::now()->subWeek()->format('Y-m-d')
        ));
    }
}
