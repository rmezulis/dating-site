<?php

use App\Like;
use App\Picture;
use App\Profile;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 500)->create()->each(function ($user) {
            $user->profile()->save(factory(Profile::class)->make(['user_id' => $user->id]));
            $user->pictures()->saveMany(factory(Picture::class, rand(1, 6))->make(['user_id' => $user->id]));
        });
    }
}
