<?php

namespace App\Http\Controllers;

use App\Models\Password_Resets;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class UserController extends Controller
{
    public function searchToken():JsonResponse
    {
        $token=Password_Resets::where('token',request('token'))->first();
        if($token->expired_at<new Date())
        {
            return response()->json([
                'status' => 200,
            ]);
        }
        return response()->json([
            'status' => 200,
        ]);
    }
}
