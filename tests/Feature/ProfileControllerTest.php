<?php

namespace Tests\Feature;

use App\Picture;
use App\Profile;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testProfilePage(): void
    {
        factory(User::class)->create();
        factory(Profile::class)->create(['user_id' => User::first()->id]);
        factory(Picture::class)->create(['user_id' => User::first()->id]);
        Auth::loginUsingId(User::first()->id);


        $response = $this->get('/profile', [
            'profile' => Profile::first(),
            'pictures' => Picture::first()
        ]);
        $response->assertSeeText('My profile');

        $response->assertSuccessful();
    }

//    public function testEditProfileRoute()
//    {
//        factory(User::class)->create();
//        factory(Profile::class)->create(['user_id' => User::first()->id]);
//        Auth::loginUsingId(User::first()->id);
//        $response = $this->get('/profile/edit', [
//            'profile' => Profile::first()
//        ]);
//        $response->assertSeeText('Mewbvcbvb');
//
//    }
    public function testNewProfileRoute()
    {
        factory(User::class)->create();
        Auth::loginUsingId(User::first()->id);
        $response = $this->get('/profile/new');
        $response->assertSeeText('New profile');
        $response->assertSuccessful();
    }

//    public function testStoreProfile()
//    {
//        factory(User::class)->create();
//        factory(Profile::class)->create(['user_id' => User::first()->id]);
//        Auth::loginUsingId(User::first()->id);
//        $this->post('/profile/new', [
//            'first_name' => 'Test'
//        ]);
//        dd(\auth()->user()->profile);
//        $this->assertDatabaseHas('profiles', [
//            'first_name' => 'test'
//        ]);
//    }
}
