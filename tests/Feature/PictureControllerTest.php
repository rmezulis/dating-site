<?php

namespace Tests\Feature;

use App\Picture;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PictureControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testEditPicturesRoute(): void
    {
        factory(User::class)->create()->each(function ($user) {
            $user->pictures()->save(factory(Picture::class)->make(['user_id' => $user->id]));
        });
        Auth::loginUsingId(User::first()->id);
        $response = $this->get('/profile/pictures/edit', [
            'pictures' => User::first()->pictures
        ]);
        $response->assertSeeText('Edit pictures');
        $response->assertSuccessful();
    }

//    public function testStorePictures(): void
//    {
//        Storage::fake('pictures');
//        $picture = UploadedFile::fake()->image('test.png');
//        factory(User::class)->create();
//        Auth::loginUsingId(User::first()->id);
//        $this->json('POST', '/profile/pictures/edit', [
//            'pictures' => $picture
//        ]);
//        Storage::disk('pictures')->assertExists($picture->hashName());
//    }


    public function testDelete()
    {
        factory(User::class)->create()->each(function ($user) {
            $user->pictures()->save(factory(Picture::class)->make(['user_id' => $user->id]));
        });
        $picture = Picture::first();
        $this->post('/profile/pictures/delete/{picture}', [$picture]);
        $this->assertDatabaseMissing('pictures', [$picture]);
    }
}
