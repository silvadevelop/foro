<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
       $user= factory(\App\User::class)->create([
           'name'=>'Diego Silva',
           'email'=>'admin@silva.com'
       ]);

        $this->actingAs($user,'api');
        $this->visit('api/user')
             ->see('Diego Silva')
             ->see('admin@silva.com');
    }
}
