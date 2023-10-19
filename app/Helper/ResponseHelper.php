<?php
namespace App\Helper;


class ResponseHelper 
{
    public static function Out($status, $msg, $code)
    {
        if ($status == "success") {
            return response()->json([
                'status' => $status,
                'msg' => $msg,
            ], $code);
        }else{
            return response()->json([
                'status' => $status,
                'msg' => $msg,
            ], $code);
        }
    }
}