<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /*$channel = factory(Channel::class, 5)->create();
        $channel->each(function (Channel $channel) {
            $threads = factory(Thread::class, 10)->create([
                'channel_id' => $channel->id
            ]);
            $threads->each(function (Thread $thread) {
                factory(Reply::class, 10)->create([
                    'thread_id' => $thread->id
                ]);
            });
        });*/

        factory('App\Thread', 30)->create();
        
        /*$threads->each(function($thread) {
            factory('App\Reply', 5)->create([
                'thread_id' =>$thread->id
            ]);
        });*/

        factory('App\Reply', 30)->create(['thread_id' => App\Thread::latest()->first()->id]);
    }
}
