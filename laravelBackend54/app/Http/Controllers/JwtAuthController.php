<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\EncodeRequest;
use Illuminate\Contracts\Auth\Guard;
use App\Repositories\UserRepository;

class JwtAuthController extends Controller
{

  protected $users;

  public function __construct(UserRepository $repo1){
    $this->users = $repo1;
  }

  public function register(RegisterUserRequest $request){
    $name = $request->input('name');
    $username = $request->input('username');
    $password = $request->input('password');
    $role = $request->input('role');

    if($this->users->store($name,$username,$password,$role)){
      return response()->json([
        'message'=>'Register Berhasil',
      ],201);
    }

    return response()->json([
        'message'=>'Register Gagal',
      ],400);



  }

  public function login(Guard $auth,LoginUserRequest $request){
    $credentials = $request->only(['username', 'password']);

    if ($auth->attempt($credentials)) {
       $token = $auth->issue();
       return response()->json([
          'response' => 'success',
          'result' => [
              'token' => $token,
          ],
      ]);
    }

    return ['Invalid Credentials'];
  }

  public function decode(Guard $auth,EncodeRequest $request){
    $token = $request->token;
    $raw = $auth->manager()->parseToken($token);
    if($raw){
      $claims = $raw->getClaims();
      return $claims;
    }
    return ['Invalid Token'];
  }
    //
}
