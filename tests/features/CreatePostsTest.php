<?php

/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 27/9/2017
 * Time: 11:18
 */
class CreatePostsTest extends FeatureTestCase
{
    public function test_a_user_create_a_post(){

    //having
    $title ='Esta es una pregunta';
    $content ='Este es el contenido';
    $this->actingAs($user=$this->defaultUser());

    //when
    $this->visit(route('posts.create'))
        ->type($title,'title')
        ->type($content,'content')
        ->press('Publicar');

    //then
    $this->seeInDatabase('posts',[
        'title' => $title,
        'content'=> $content,
        'pending'=>true,
        'user_id'=>$user->id,
    ]);

    // el usuario es redirigido al detalle del post
    $this->see($title);
}

    public function test_a_creating_a_post_requires_authentication(){

        $this->visit(route('posts.create'))
            ->seePageIs(route('login'));
    }
    public function test_create_post_form_validation(){

        $this->actingAs($this->defaultUser())
            ->visit(route('posts.create'))
            ->press('Publicar')
            ->seePageIs(route('posts.create'))
            ->seeErrors([
               'title'=>'El campo título es obligatorio',
                'content'=>'El campo contenido es obligatorio'
            ]);

    }
}