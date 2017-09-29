<?php

/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 27/9/2017
 * Time: 10:51
 */
use  \Illuminate\Foundation\Testing\DatabaseTransactions;
class FeatureTestCase extends TestCase
{
   use DatabaseTransactions;

   public function seeErrors(array $fields){

       foreach ($fields as $name =>$errors){
           foreach ((array)$errors as $message){

               $this->seeInElement(
                   "#field_{$name}.has-error .help-block",
                   $message
               );
           }
       }

   }
}