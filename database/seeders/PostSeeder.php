<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::inRandomOrder()->limit(20)->get() as $user) {
            Post::factory(100)->for($user, 'author')->create()->each(function (Post $post) use ($user) {
                $post->tags()->saveMany(Tag::factory()->count(4)->make());
            });
        }

        Post::each(function (Post $post) {
            $post->likes()->saveMany(User::inRandomOrder()->limit(10)->get()->map(function (User $user) {
                return new Like(['user_id' => $user->id]);
            }));
        });
    }
}
