<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        if (User::where('email', $request->email)->first()) {
            return response()->json([
                'etat' => "l'email existe déjà",
                'status' => 403
            ]);
        }
        $name = '/avatars/' . uniqid() . '.' . "jpg";
        $user = User::create([
            'name' => ucfirst($request->name),
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'work_space' => ucfirst($request->work_space),
            'avatar' => $request->avatar ? $name : null
        ]);
        if ($user) {
            if ($request->avatar) {
                $file = $request->file('img_profile');
                $file->storePubliclyAs('public', $name);
            }
            return response()->json([
                'etat' => "L'utilisateur a créé avec succès",
                'status' => 201
            ]);
        }


        return response()->json([
            'etat' => "Erreur du serveur !!!Réessayer s'il vous plaît",
            'status' => 500
        ]);
    }
}
