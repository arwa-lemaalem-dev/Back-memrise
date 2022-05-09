<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function register(Request $request):JsonResponse
    {
        if (User::where('email', request('email'))->first()) {
            return response()->json([
                'etat' => "l'email existe déjà",
                'status' => 403
            ]);
        }
        $name = '/avatars/' . uniqid() . '.' . "jpg";
        $user = User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'work_space' => $request->work_space,
            'avatar'=>$name
        ]);
        if ($user) {
            $file = $request->file('img_profile');
            $file->storePubliclyAs('public', $name);
            return response()->json([
                'etat' => "L'utilisateur a créé avec succès",
                'status' => 200
            ]);
        }


        return response()->json([
            'etat' => "Erreur du serveur !!!Réessayer s'il vous plaît",
            'status' => 200
        ]);
    }
}
