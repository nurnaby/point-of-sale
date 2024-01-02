<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Mail\OTPMail;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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


     function SendOTPcode(Request $request){

              $email= $request->input('email');
              $otp=rand(1000,9999);
              $count =User::where('email','=',$email)->count();

              if($count===1){
                //otp email address
                Mail::to($email)->send(new OTPMail($otp));
               // OTO Code Table Update
               User::where('email','=',$email)->update(['otp'=>$otp]);
               return response()->json([
                'status' => 'success',
                'message' => '4 Digit OTP Code has been send to your email !'
            ],200);

              }else{
                return response()->json([
                    'status'=>'falied',
                    'message'=>'unauthorized'
                ],200);
              }

     }



}