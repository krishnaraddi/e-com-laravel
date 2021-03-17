<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function login(Request $request){

      //  return $request->input();

      $user= User:: where(['email'=>$request->email])->first();

      if(!$user || !Hash::check($request->password, $user->password)){
          return "user name or password is not correct";

      }else{
        $request->session()->put('user', $user);
          return redirect("/products");
      }

    }
}