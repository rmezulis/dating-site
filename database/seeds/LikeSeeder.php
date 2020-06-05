<?php

use App\Like;
use App\User;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user) {
            for ($i = 0; $i < rand(1, 6); $i++) {
                $this->like($user, $this->randomUser($user));
            }
            for ($i = 0; $i < rand(1, 6); $i++) {
                $user->likes()->attach($this->randomUser($user)->id, ['like' => false]);
            }
        }
    }

    private function like(User $user, User $judgedUser)
    {
        $user->likes()->attach($judgedUser->id, ['like' => true]);
        if ($this->match($user, $judgedUser)) {
            $user->matchedWith()->attach($judgedUser->id);
        }
    }

    private function match(User $user, User $judgedUser)
    {
        return Like::where('judged_id', $user->id)
            ->where('user_id', $judgedUser->id)
            ->firstWhere('like', true);
    }

    private function randomUser(User $user)
    {
        return $user->profile
            ->withoutSeen($user)
            ->inRandomOrder()
            ->first()->user;
    }
}
