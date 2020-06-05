<?php

namespace Tests\Feature;

use App\Picture;
use App\Profile;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class SwipeControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testMembersRoute()
    {
        factory(User::class)->create();
        factory(Profile::class)->create(['user_id' => User::first()->id]);
        factory(Picture::class)->create(['user_id' => User::first()->id]);
        Auth::loginUsingId(User::first()->id);
        $response = $this->get('/members', [
            'profile' => Profile::first(),
            'pictures' => Picture::first()
        ]);
        $response->assertSeeText('Matching');

        $response->assertSuccessful();
    }

    public function testShowAllMatches()
    {
        factory(User::class)->create();
        Auth::loginUsingId(User::first()->id);

        $response = $this->get('/matches');
        $response->assertSeeText('My matches');
        $response->assertSuccessful();
    }

    public function testShowOneMatch()
    {
        factory(User::class)->create();
        factory(Profile::class)->create(['user_id' => User::first()->id]);
        factory(Picture::class)->create(['user_id' => User::first()->id]);
        Auth::loginUsingId(User::first()->id);
        $user = auth()->user();
        $response = $this->get('/matches/1', [
            'profile' => $user->profile,
            'pictures' => $user->pictures
        ]);
        $response->assertSeeText($user->profile->fullName);
        $response->assertSuccessful();
    }

//    public function testLikeUser()
//    {
//        factory(User::class, 2)->create();
//        Auth::loginUsingId(User::find(1)->id);
//        $user = auth()->user();
//        $this->post('/members/{user}/like', [
//            User::find(2)
//        ]);
//        dd($user->likes);
//        $this->assertDatabaseHas('likes', [
//            'user_id' => 1,
//            'judged_id' => 2,
//            'like' => true
//        ]);
//    }
}
