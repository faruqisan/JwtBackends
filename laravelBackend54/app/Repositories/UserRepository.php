<?php

namespace App\Repositories;

class UserRepository{
  public function store($name,$username,$password,$role){

    \DB::beginTransaction();
    try{

      $isRoleExist = \App\Role::where('name',$role)->first();

      if(!$isRoleExist){
        $newRole = new \App\Role();
        $newRole->name = $role;
        $newRole->save();
        $isRoleExist = $newRole;
      }

      $user = new \App\User();
      $user->name = $name;
      $user->username = $username;
      $user->password = bcrypt($password);
      $user->save();

      $userRole = new \App\UserRole();
      $userRole->role_id = $isRoleExist->id;
      $user->user_role()->save($userRole);

      \DB::commit();
			return true;
    }catch(\Throwable $t){
      \DB::rollBack();
      Log::info($t->getMessage());
			return false;
    }


  }
}

 ?>
