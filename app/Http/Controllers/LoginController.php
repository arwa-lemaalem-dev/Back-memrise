<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login():JsonResponse
    {$user = User::where('email', request('email'))->first();
        if ($user) {
            if (Hash::check(request('password'),$user->password)) {
                $token=$user->createToken(time())->plainTextToken;
                session(['token'=>$token,'user'=>Auth::user()]);
                return response()->json([
                    'etat' =>'Bienvenue' .' ' .ucfirst($user->name) .' dans votre application ( ' .ucfirst($user->work_space) .' )',
                    'status' => 200,
                    'token' => $token,
                    'user' => $user,
                ]);
            }
            return response()->json([
                'etat' =>
                    'Vos identifiants ne correspondent pas à nos enregistrements.',
                'status' => 404,
            ]);
        }
        return response()->json([
            'etat' => 'Vous avez entré un email invalide.',
            'status' => 404,
        ]);
    }

    public function Logout(Request $request):JsonResponse
    {
        $request->user()->tokens()->delete();
        session()->flush();
        return response()->json([
            'status' =>200,
        ]);
    }
}
