<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    function userLoginPage(){
        return view('pages.login-page');
    }


    function userRegistrationAction(Request $request){
        try{
            $fullName = $request->input('fullName');
            $userName = $request->input('userName');
            $email = $request->input('email');
            $password = $request->input('password');

            $profile_picture = $request->file('profile_picture');
            $time = time();
            $file_name = $profile_picture->getClientOriginalName();
            $image_name = "{$userName}-{$time}-{$file_name}";
            $image_url = "uploads/{$image_name}";

            // File Upload
            $profile_picture->move(public_path('uploads'), $image_name);

            // User Registration 
            User::create([
                'fullName'=>$fullName,
                'userName'=>$userName,
                'email'=>$email,
                'password'=>$password,
                'profile_picture'=>$image_url
            ]);

            return response()->json([
                'status'=>'success',
                'message'=>'You have been registered successfully'
            ],201);

        }
        catch(Exception $e){
            return response()->json([
                'status'=>'fail',
                'message'=>'Request failed to register'
            ]);
        }
    }


    function userLoginAction(Request $request){
        try{
            $email = $request->input('email');
            $password = $request->input('password');

            $user = User::where('email', '=', $email)->where('password', '=', $password)->first();

            if($user !== null){
                $token = JWTToken::createToken($email, $user->id);

                return response()->json([
                    'status'=>'success',
                    'message'=>'Login successfull',
                    'token'=>$token
                ])->cookie('token', $token, 60*24*60);

            }else{
                return response()->json([
                    'status'=>'fail',
                    'message'=>'Login fail'
                ]);
            }
        }
        catch(Exception $e){
            return response()->json([
                'status'=>'fail',
                'message'=>'Something went wrong'
            ]);
        }
    }


    function userLogoutAction(){
        return redirect('/userLogin')->cookie('token', '', -1);
    }


    function userProfileInfoShow(Request $request){
       try{
        $email = $request->header('email');
        $info = User::where('email', '=', $email)->first();

        return response()->json([
            'status'=>'success',
            'message'=>'Request successfull',
            'info'=>$info
        ]);
       }
       catch(Exception $e){
            return response()->json([
                'status'=>'fail',
                'message'=>'Something went wrong'
            ]);
       }
    }


    function userProfileInfoUpdating(Request $request){
        try{
            $email = $request->header('email');

            $fullName = $request->input('fullName');
            $userName = $request->input('userName');
            $password = $request->input('password');

            if($request->hasFile('profile_picture')){
                $image = $request->file('profile_picture');
                $time = time();
                $file_name = $image->getClientOriginalName();
                $image_name = "{$userName}-{$time}-{$file_name}";
                $image_url = "uploads/{$image_name}";

                // Profile Picture Upload
                $image->move(public_path('uploads'), $image_name);

                // Old profile picture delete
                $filePath=$request->input('file_path');
                File::delete($filePath);

                // User profile update
                User::where('email', '=', $email)->update([
                    'fullName'=>$fullName,
                    'userName'=>$userName,
                    'email'=>$email,
                    'password'=>$password,
                    'profile_picture'=>$image_url
                ]);

                return response()->json([
                    'status' => 'success',
                    'message'=>'The iuser profile has been updated successfully'
                ]);
                
            }else{
                User::where('email', '=', $email)->update([
                    'fullName'=>$fullName,
                    'userName'=>$userName,
                    'email'=>$email,
                    'password'=>$password
                ]);

                return response()->json([
                    'status' => 'success',
                    'message'=>'The iuser profile has been updated successfully'
                ]);
            }
        }
        catch(Exception $e){
            // User profile updating without updating profile picture
            return response()->json([
                'status'=>'fail',
                'message'=>'Something went wrong to update profile'
            ]);
        }
    }


}