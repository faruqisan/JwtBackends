<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JwtTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testSuccessRegister(){
      $response = $this->json('POST', '/api/register', [
          'name' => 'testuser',
          'username' => 'testusername00',
          'password' => 'mypassword123',
          'role' => 'admin',
        ]);

      $response
          ->assertStatus(201)
          ->assertJson([
              'message' => 'Register Berhasil',
          ]);
    }

    // public function testFailRegisterWithAlreadyTakenUsername(){
    //   $response = $this->json('POST', '/api/register', [
    //       'name' => 'testuser',
    //       'username' => 'testusernmame2',
    //       'password' => 'mypassword123',
    //       'role' => 'admin',
    //     ]);
    //
    //   $response
    //       ->assertStatus(422)
    //       ->assertJson([
    //           'username' => ['The username has already been taken.'],
    //       ]);
    // }

    public function testFailRegisterWithEmptyParams(){
      $response = $this->json('POST', '/api/register', [
          'name' => 'testuser',
          'username' => 'testusernmame2',
          'password' => 'mypassword123',
          'role' => '',
        ]);

      $response
          ->assertStatus(422);
    }

    public function testSuccessLogin(){
      $response = $this->json('POST', '/api/login', [
          'username' => 'testusername00',
          'password' => 'mypassword123',
        ]);

      $response
          ->assertStatus(200)
          ->assertJson([
              'response' => 'success',
          ]);
    }

    public function testFailLogin(){
      $response = $this->json('POST', '/api/login', [
          'username' => 'testusername00',
          'password' => 'mypassword1234',
        ]);

      $response
          ->assertStatus(400)
          ->assertJson([
              'message' => 'Invalid Credentials',
          ]);
    }

    // decode test cant run bcause token always changing
}
