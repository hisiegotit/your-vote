<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GravatarTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function user_got_gravatar_generated_when_email_not_found()
    {
        $user = User::factory()->create([
            'name' => 'Hisie',
            'email' => 'dbahjwdbawd@gmail.com',
        ]);

        $gravatarUrl = $user->getAvatar();

        $this->assertEquals(
            'https://gravatar.com/avatar/'
                . md5(($user->email))
                . '?s=200&d=monsterid',
            $gravatarUrl
        );

        $response = Http::get($user->getAvatar());

        $this->assertTrue($response->successful());
    }
}
