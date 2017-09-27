<?php



class ExampleTest extends FeatureTestCase
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
   function test_basic_example()
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
