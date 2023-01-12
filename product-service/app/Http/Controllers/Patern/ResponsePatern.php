<?php

namespace App\Http\Controllers\Patern;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponsePatern extends Controller
{
    public static function patern($status,$message,$data = null){
        if(isnull($data)){
            return [
                'status'=> $status,
                'message'=> $message
            ];
        }
        return [
            'status'=>$status,
            'message'=>$message,
            'data'=>$data
        ];
    }
}
