<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testBasic()
    {
        // $this->assertTrue(true);
        $response = $this->get('/order');
        // $this->assertTrue(true);
        $response->assertStatus(200);
    }
}