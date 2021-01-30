<?php

namespace Tests\Unit;

use Tests\TestCase;
use Iluminate\Foundation\Testing\withFaker;
use Iluminate\Foundation\Testing\RefreshDatabase;
class DatabaseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertDatabaseHas('users', [
        	'email'=>'admin@admin.com'
        ]);
    }
}
