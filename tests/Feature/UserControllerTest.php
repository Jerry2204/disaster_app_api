<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->withCookie('email', 'password')->get('/login');

        $response = $this->withCookies([
            'email' => 'evanhutagaol@gmail.com',
            'password' => 'evan123',
        ])->get('/login');





















    }
}
