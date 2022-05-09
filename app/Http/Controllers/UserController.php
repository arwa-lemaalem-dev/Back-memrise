<?php

namespace App\Http\Controllers;

use App\Models\Password_Resets;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    public function searchToken(Request $request): JsonResponse
    {
        $now=strtotime(Carbon::now());
        $token = Password_Resets::where('token', request('token'))->first();
        if ($token) {
            $expired_at=strtotime($token->expired_at);
            if ((($expired_at-$now)/60)<=config('memrise.TOKEN_EXPIRED')) {
                $email=$token->email;
                Password_Resets::where('token', request('token'))->delete();
                return response()->json([
                    'status' => 200,
                    'email'=>$email,
                    'message'=>'Jeton existe',
                ]);
            }
        }
        return response()->json([
            'status' => 404,
            'message'=>'Votre jeton a expiré'
        ]);
    }
}
