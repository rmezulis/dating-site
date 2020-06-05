<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class SettingControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testSettingsRoute()
    {
        factory(User::class)->create();
        Auth::loginUsingId(User::first()->id);
        $response = $this->get('/settings');
        $response->assertSuccessful();
    }

}
