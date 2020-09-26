<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MentionUsersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function mentioned_users_in_a_reply_are_notified()
    {
        $frose = create('App\User', ['name' => 'Frosina']);

        $this->signIn($frose);

        $sano = create('App\User', ['name' => 'Aleksandar']);

        $thread = create('App\Thread');

        $reply = make('App\Reply', [
            'body' => 'Hey @Aleksandar check this out.'
        ]);

        $this->json('post', $thread->path() . '/replies', $reply->toArray());

        $this->assertCount(1, $sano->notifications);
    }

    /** @test */
    function it_can_fetch_all_mentioned_users_starting_with_the_given_characters()
    {
        create('App\User', ['name' => 'frosina']);
        create('App\User', ['name' => 'frosina2']);
        create('App\User', ['name' => 'filimena']);

        $results = $this->json('GET', '/api/users', ['name' => 'frosi']);

        $this->assertCount(2, $results->json());
    }
}