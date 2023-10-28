<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{

    public static function createToken($userEmail, $userId, $userType)
    {
        $key = env('JWT_SECRET_KEY');
        $payload = [
            'iss' => 'recipe_sharing_plateform',
            'iat' => time(),
            'exp' => time() + 60 * 60 * 24,
            'userEmail' => $userEmail,
            'userId' => $userId,
            'userType' => $userType
        ];
        $token = JWT::encode($payload, $key, 'HS256');
        return $token;
    }

    public static function createTokenForPassword($userEmail)
    {
        $key = env('JWT_SECRET_KEY');
        $payload = [
            'iss' => 'sabuj-token',
            'iat' => time(),
            'exp' => time() + 60 * 20,
            'userEmail' => $userEmail,
            'userId' => '0'
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        return $token;

    }

    public static function verifyToken($token)
    {
        try {
            if ($token !== null) {
                $key = env('JWT_SECRET_KEY');
                $decoded = JWT::decode($token, new Key($key, 'HS256'));

                return $decoded;
            } else {
                return 'unauthorized';
            }

        } catch (Exception $e) {
            return 'unauthorized';
        }
    }






}