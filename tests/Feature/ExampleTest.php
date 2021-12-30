<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/')->assertStatus(200);
        $this->get('/register')->assertSeeText('Register');


        $response->assertStatus(200);
    }
}
