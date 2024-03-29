<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FavoritesTest extends TestCase
{
    use DatabaseMigrations;


    /** @test */
    public function test_guests_cannot_favorite_anything()
    {
        $this->withExceptionHandling()
            ->post('forum/replies/1/favorites')
            ->assertRedirect('/forum/login');
    }


    /** @test */
    public function test_an_authenticated_user_can_favorite_any_reply()
    {
        $this->signIn();
        $reply = create('App\Reply');
        $this->post('forum/replies/' . $reply->id . '/favorites');
        $this->assertCount(1, $reply->favorites);
    }

    /** @test */
    public function test_an_authenticated_user_may_only_favorite_a_reply_once()
    {
        $this->signIn();
        $reply = create('App\Reply');

        try {
            $this->post('forum/replies/' . $reply->id . '/favorites');
            $this->post('forum/replies/' . $reply->id . '/favorites');
        } catch (\Exception $e) {
            $this->fail('Did not expect to insert the same record set twice.');
        }

        $this->assertCount(1, $reply->favorites);
    }
}
