<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Helper\JWTToken;
use App\Helper\ResponseHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    function userLoginPage()
    {
        return view('pages.auth.login-page');
    }
    function forgetPasswordPage()
    {
        return view('pages.auth.forget-password-page');
    }
    function resetPasswordPage()
    {
        return view('pages.auth.reset-password-page');
    }
    function account(Request $request)
    {
        $user_id = $request->header('id');
        $user = User::where('id', $user_id)->first();
        return view('pages.frontend.account.index', compact('user'));
    }

    function userRegistration(Request $request)
    {
        $fullName = $request->input('fullName');
        $userName = $request->input('userName');
        $email = $request->input('email');
        $password = $request->input('password');
        $profile_picture = $request->input('profile_picture');

        $emailCheck = User::where('email', $email)->first();
        if ($emailCheck) {
            return ResponseHelper::Out('uniqueEmail', "Already Sign Up With This Email!", 200);
        } else {
            User::create([
                'fullName' => $fullName,
                'userName' => $userName,
                'email' => $email,
                'password' => Hash::make($password),
                'profile_picture' => $profile_picture
            ]);

            return ResponseHelper::Out('success', 'Registration Complete!', 200);
        }
    }


    function userLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();
        $passwordCheck = Hash::check($password, $user->password);
        if (!$user) {
            return ResponseHelper::Out('notFound', 'Please Enter Your Vaild Email!', 200);
        }elseif (!$passwordCheck) {
            return ResponseHelper::Out('notFound', 'Enter Valid password!', 200);
        }else{
            $token = JWTToken::createToken($email, $user->id, $user->userType);

            return response()->json([
                'status' => 'success',
                'message' => 'Login successfull',
                'userType' => $user->userType
            ])->cookie('token', $token, 60 * 24 * 60);
        }

    }


    function userLogout()
    {
        return redirect('/login')->cookie('token', '', -1);
    }


    function userProfileInfoShow(Request $request)
    {
        try {
            $email = $request->header('email');
            $info = User::where('email', '=', $email)->first();

            return response()->json([
                'status' => 'success',
                'message' => 'Request successfull',
                'info' => $info
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Something went wrong'
            ]);
        }
    }


    function userProfileInfoUpdating(Request $request)
    {
        try {
            $email = $request->header('email');

            $fullName = $request->input('fullName');
            $userName = $request->input('userName');
            $password = $request->input('password');

            if ($request->hasFile('profile_picture')) {
                $image = $request->file('profile_picture');
                $time = time();
                $file_name = $image->getClientOriginalName();
                $image_name = "{$userName}-{$time}-{$file_name}";
                $image_url = "uploads/{$image_name}";

                // Profile Picture Upload
                $image->move(public_path('uploads'), $image_name);

                // Old profile picture delete
                $filePath = $request->input('file_path');
                File::delete($filePath);

                // User profile update
                User::where('email', '=', $email)->update([
                    'fullName' => $fullName,
                    'userName' => $userName,
                    'email' => $email,
                    'password' => $password,
                    'profile_picture' => $image_url
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'The iuser profile has been updated successfully'
                ]);

            } else {
                User::where('email', '=', $email)->update([
                    'fullName' => $fullName,
                    'userName' => $userName,
                    'email' => $email,
                    'password' => $password
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'The iuser profile has been updated successfully'
                ]);
            }
        } catch (Exception $e) {
            // User profile updating without updating profile picture
            return response()->json([
                'status' => 'fail',
                'message' => 'Something went wrong to update profile'
            ]);
        }
    }


}
