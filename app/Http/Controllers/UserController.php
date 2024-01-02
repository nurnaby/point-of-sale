<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Helper\JWTToken;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function UserRegistration(Request $request){
        
    //   dd($request->all()) ;


        try {
            User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email'    => $request->input('email'),
                'mobile'   => $request->input('mobile'),
                'password' => $request->input('password'),
                
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'User Registration Successfully'
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => "failed",
                'message' => $e->getMessage(),
            ],200);

        }
     }
     function UserLogin(Request $request){
      $count =  User::where('email','=',$request->input('email'))
        ->where('password','=',$request->input('password'))->count();
        
        if($count ==1){
            $token = JWTToken::CreateToken($request->input('email'));
            return response()->json([
                'status'=>'success',
                'message'=>'User login successful',
                'token'=>$token
            ]);

        }else{
            return response()->json([
                'status'=>'failed',
                'message'=>'unauthorized'
            ]);

        }

     }



}